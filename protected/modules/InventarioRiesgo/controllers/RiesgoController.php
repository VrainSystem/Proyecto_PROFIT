<?php

Yii::import('application.modules.Configuracion.models.*');
Yii::import('application.modules.ProcesosEstrategias.models.*');

class RiesgoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    public function actionDatosHeatMap() {
        if (isset($_POST['IdUnidadNegocio'])) {
            $idUnidadNegocio = $_POST['IdUnidadNegocio'];
        } else {
            $idUnidadNegocio = 0;
        }

        $maxValueImpactoCualitativo = $_POST['maxValueImpactoCualitativo'];
        $maxValueProbabilidadCualitativa = $_POST['maxValueProbabilidadCualitativa'];
        $arrayTabla = array();
        for ($index = $maxValueImpactoCualitativo; $index >= 1; $index--) {
            $arrayFilas = array();

            for ($index1 = 1; $index1 <= $maxValueProbabilidadCualitativa; $index1++) {
                $totalRiesgosCol = 0;
                $probabilidadCualitativa = ProbabilidadCualitativa::model()->findByAttributes(array('valor' => $index1));
                $impactoCualitativo = ImpactoCualitativo::model()->findByAttributes(array('valor' => $index));
                if ($idUnidadNegocio == 0 || $idUnidadNegocio == "0") {
                    $riesgos = Riesgo::model()->findAll();
                } else {
                    $unidadNegocio = UnidadNegocio::model()->findByPk($idUnidadNegocio);
                    $riesgos = $unidadNegocio->riesgos;
                }

                foreach ($riesgos as $value) {

                    if ($value->probabilidad_cualitativa == $probabilidadCualitativa->nombre && $value->impacto_cualitativo == $impactoCualitativo->nombre) {

                        $totalRiesgosCol++;
                    }
                }
                array_push($arrayFilas, $totalRiesgosCol);
            }
            array_push($arrayTabla, $arrayFilas);
        }

        $json = json_encode($arrayTabla);
        echo $json;
    }

    public function actionCantidadRiesgosCriticos() {

        $totalRiesgosCol = 0;
        $riesgos = Riesgo::model()->findAllByAttributes(array('estado' => 1));

        foreach ($riesgos as $value) {
            if ($value->probabilidad_cualitativa == ' Intolerable' && $value->impacto_cualitativo == $impactoCualitativo->nombre) {
                $totalRiesgosCol++;
            }
        }
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id_riesgo) {
        $this->render('view', array(
            'id_riesgo' => $id_riesgo,
        ));
    }

    public function actionUpdate($id_riesgo = null) {
        if (isset($_POST['idRiesgoActualizar'])) {
            $idRiesgo = $_POST['idRiesgoActualizar'];
            $model = Riesgo::model()->findByPk($idRiesgo);


            $impactoPesimista = (double) $_POST['impactoPesimistaActualizar'];
            $impactoProbable = (double) $_POST['impactoProbableActualizar'];
            $impactoOptimista = (double) $_POST['impactoOptimistaActualizar'];

            $impactoDeterministico = ($impactoPesimista + 4 * $impactoProbable + $impactoOptimista) / 6;

            $ProbabilidadPesimista = (double) $_POST['probabilidadPesimistaActualizar'];
            $ProbabilidadProbable = (double) $_POST['probabilidadProbableActualizar'];
            $ProbabilidadOptimista = (double) $_POST['probabilidadOptimistaActualizar'];

            $probabilidadDeterministica = ($ProbabilidadPesimista + 4 * $ProbabilidadProbable + $ProbabilidadOptimista) / 6;

            $riesgoDeterministico = $impactoDeterministico * $probabilidadDeterministica;

            $impactoCualitativoValor = 0;
            $impactoCualitativoNombre = "";

            $modelImpactoCualitativo = ImpactoCualitativo::model()->findAll();
            foreach ($modelImpactoCualitativo as $value) {
                if ($impactoProbable >= (double) $value->rango_inferior && $impactoProbable <= (double) $value->rango_superior) {
                    $impactoCualitativoValor = $value->valor;
                    $impactoCualitativoNombre = $value->nombre;
                }
            }

            $probabilidadCualitativaValor = 0;
            $probabilidadCualitativaNombre = "";

            $modelProbabilidadCualitativa = ProbabilidadCualitativa::model()->findAll();
            foreach ($modelProbabilidadCualitativa as $value) {
                if ($ProbabilidadProbable >= (double) $value->rango_inferior && $ProbabilidadProbable <= (double) $value->rango_superior) {
                    $probabilidadCualitativaValor = $value->valor;
                    $probabilidadCualitativaNombre = $value->nombre;
                }
            }
            $riesgoCualitativo = "";
            $aux = (double) $probabilidadCualitativaValor * (double) $impactoCualitativoValor;
            $modelRiesgoCualitativo = RiesgoCualitativo::model()->findAll();
            foreach ($modelRiesgoCualitativo as $value) {
                if ($aux >= (double) $value->rango_inferior && $aux <= (double) $value->rango_superior) {
                    $riesgoCualitativo = $value->nombre;
                }
            }



            $model->id_grupo_riesgo = $_POST['idGrupoRiesgoActualizar'];
            $model->codigo = $_POST['codigoRiesgoActualizar'];
            $model->nombre = $_POST['nombreRiesgoActualizar'];
            $model->id_tipo_riesgo = $_POST['idTipoRiesgoActualizar'];
            $model->id_tipo_perdida = $_POST['idTipoPerdidaActualizar'];
            $model->descripcion_causa = $_POST['descripcionCausaActualizar'];
            $model->id_actividad_control = $_POST['idActividadControlActualizar'];
            $model->descripcion_actividad_control = $_POST['descripcionActividadControlActualizar'];

            $model->impacto_pesimista = $_POST['impactoPesimistaActualizar'];
            $model->impacto_probable = $_POST['impactoProbableActualizar'];
            $model->impacto_optimista = $_POST['impactoOptimistaActualizar'];

            $model->descripcion_impacto_pesimista = $_POST['descripcionImpactoPesimistaActualizar'];
            $model->descripcion_impacto_probable = $_POST['descripcionImpactoProbableActualizar'];
            $model->descripcion_impacto_optimista = $_POST['descripcionImpactoOptimistaActualizar'];

            $model->probabilidad_pesimista = $_POST['probabilidadPesimistaActualizar'];
            $model->probabilidad_probable = $_POST['probabilidadProbableActualizar'];
            $model->probabilidad_optimista = $_POST['probabilidadOptimistaActualizar'];

            $model->descripcion_probabilidad_pesimista = $_POST['descripcionProbabilidadPesimistaActualizar'];
            $model->descripcion_probabilidad_probable = $_POST['descripcionProbabilidadProbableActualizar'];
            $model->descripcion_probabilidad_optimista = $_POST['descripcionProbabilidadOptimistaActualizar'];

            $model->impacto_deterministico = $impactoDeterministico;
            $model->probabilidad_deterministica = $probabilidadDeterministica;
            $model->riesgo_deterministico = $riesgoDeterministico;

            $model->impacto_cualitativo = $impactoCualitativoNombre;
            $model->probabilidad_cualitativa = $probabilidadCualitativaNombre;
            $model->riesgo_cualitativo = $riesgoCualitativo;
            if ($model->save()) {

                //limpiar registros en las tablas de relaciones many to many
                $modelCausasRiesgoOld = CausaRiesgo::model()->findAllByAttributes(array('id_riesgo' => $idRiesgo));
                foreach ($modelCausasRiesgoOld as $value) {
                    $value->delete();
                }
                $modelObjetivosEstrategicosRiesgoOld = ObjetivoEstrategicoRiesgo::model()->findAllByAttributes(array('id_riesgo' => $idRiesgo));
                foreach ($modelObjetivosEstrategicosRiesgoOld as $value) {
                    $value->delete();
                }
                $modelProcesosRiesgosOld = ProcesoRiesgo::model()->findAllByAttributes(array('id_riesgo' => $idRiesgo));
                foreach ($modelProcesosRiesgosOld as $value) {
                    $value->delete();
                }
                $modelRiesgoUnidadesNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_riesgo' => $idRiesgo));
                foreach ($modelRiesgoUnidadesNegocio as $value) {
                    $value->delete();
                }


                //Fin limpiar registros en las tablas de relaciones many to many

                foreach ($_POST['idCausaActualizar'] as $value) {
                    $modelCausaRiesgo = new CausaRiesgo();
                    $modelCausaRiesgo->id_riesgo = $model->id_riesgo;
                    $modelCausaRiesgo->id_causa = $value;
                    $modelCausaRiesgo->save();
                }
                if (isset($_POST['idObjetivoEstrategicoActualizar'])) {
                    foreach ($_POST['idObjetivoEstrategicoActualizar'] as $value) {
                        $modelObjetivoEstrategicoRiesgo = new ObjetivoEstrategicoRiesgo();
                        $modelObjetivoEstrategicoRiesgo->id_riesgo = $model->id_riesgo;
                        $modelObjetivoEstrategicoRiesgo->id_objetivo_estrategico = $value;
                        $modelObjetivoEstrategicoRiesgo->save();
                    }
                }
                if (isset($_POST['idProcesoActualizar'])) {
                    foreach ($_POST['idProcesoActualizar'] as $value) {
                        $modelProcesoRiesgo = new ProcesoRiesgo();
                        $modelProcesoRiesgo->id_riesgo = $model->id_riesgo;
                        $modelProcesoRiesgo->id_proceso = $value;
                        $modelProcesoRiesgo->save();
                    }
                }


                foreach ($_POST['idUnidadNegocioActualizar'] as $value) {
                    $modelRiesgoUnidadNegocio = new RiesgoUnidadNegocio();
                    $modelRiesgoUnidadNegocio->id_riesgo = $model->id_riesgo;
                    $modelRiesgoUnidadNegocio->id_unidad_negocio = $value;
                    $modelRiesgoUnidadNegocio->save();
                }

                $this->render('view', array(
                    'id_riesgo' => $idRiesgo,
                ));
            }
        }
        $this->render('update', array(
            'id_riesgo' => $id_riesgo,
        ));
    }

    public function actionBusquedaAvanzada() {
        $idRiesgo = ($_POST['idRiesgo']);
        $riesgo = Riesgo::model()->findByPk($idRiesgo);
        $ocultar = "no";
        if ($_POST['unidadNegocio'] != "") {
            $unidadNegocio = $_POST['unidadNegocio'];
            foreach ($unidadNegocio as $value) {
                foreach ($riesgo->unidadNegocios as $unidadesNegocio) {
                    if ($value != "") {
                        if ($unidadesNegocio->id_unidad_negocio != $value) {
                            $ocultar = "si";
                        }
                    }
                }
            }
        }
        if ($_POST['proceso'] != "") {
            $procesos = $_POST['proceso'];
            foreach ($procesos as $value) {
                foreach ($riesgo->procesos as $proceso) {
                    if ($value != "") {
                        if ($proceso->id_proceso != $value) {
                            $ocultar = "si";
                        }
                    }
                }
            }
        }
        if ($_POST['causa'] != "") {
            $causas = $_POST['causa'];
            foreach ($causas as $value) {
                foreach ($riesgo->causas as $causa) {
                    if ($value != "") {
                        if ($causa->id_causa != $value) {
                            $ocultar = "si";
                        }
                    }
                }
            }
        }
        if ($_POST['grupoRiesgo'] != "") {
            $grupoRiesgo = $_POST['grupoRiesgo'];
            if ($riesgo->id_grupo_riesgo != $grupoRiesgo) {
                $ocultar = "si";
            }
        }
        if ($_POST['tipoRiesgo'] != "") {
            $tipoRiesgo = $_POST['tipoRiesgo'];
            if ($riesgo->id_tipo_riesgo != $tipoRiesgo) {
                $ocultar = "si";
            }
        }
        if ($_POST['tipoPerdida'] != "") {
            $tipoPerdida = $_POST['tipoPerdida'];
            if ($riesgo->id_tipo_perdida != $tipoPerdida) {
                $ocultar = "si";
            }
        }
        if ($_POST['tipoCausa'] != "") {
            $tiposCausa = $_POST['tipoCausa'];
            foreach ($tiposCausa as $value) {
                foreach ($riesgo->causas as $causa) {
                    if ($value != "") {
                        if ($causa->idTipoCausa->id_tipo_causa != $value) {
                            $ocultar = "si";
                        }
                    }
                }
            }
        }
        if ($_POST['macroproceso'] != "") {
            $macroprocesos = $_POST['macroproceso'];
            foreach ($macroprocesos as $value) {
                foreach ($riesgo->procesos as $proceso) {
                    if ($value != "") {
                        if ($proceso->idMacroproceso->id_macroproceso != $value) {
                            $ocultar = "si";
                        }
                    }
                }
            }
        }
        echo $ocultar;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (isset($_POST['idGrupoRiesgoCrear'])) {

            $impactoPesimista = (double) $_POST['impactoPesimistaCrear'];
            $impactoProbable = (double) $_POST['impactoProbableCrear'];
            $impactoOptimista = (double) $_POST['impactoOptimistaCrear'];

            $impactoDeterministico = ($impactoPesimista + 4 * $impactoProbable + $impactoOptimista) / 6;

            $ProbabilidadPesimista = (double) $_POST['probabilidadPesimistaCrear'];
            $ProbabilidadProbable = (double) $_POST['probabilidadProbableCrear'];
            $ProbabilidadOptimista = (double) $_POST['probabilidadOptimistaCrear'];

            $probabilidadDeterministica = ($ProbabilidadPesimista + 4 * $ProbabilidadProbable + $ProbabilidadOptimista) / 6;

            $riesgoDeterministico = $impactoDeterministico * $probabilidadDeterministica;

            $impactoCualitativoValor = 0;
            $impactoCualitativoNombre = "";

            $modelImpactoCualitativo = ImpactoCualitativo::model()->findAll();
            foreach ($modelImpactoCualitativo as $value) {
                if ($impactoProbable >= (double) $value->rango_inferior && $impactoProbable <= (double) $value->rango_superior) {
                    $impactoCualitativoValor = $value->valor;
                    $impactoCualitativoNombre = $value->nombre;
                }
            }

            $probabilidadCualitativaValor = 0;
            $probabilidadCualitativaNombre = "";

            $modelProbabilidadCualitativa = ProbabilidadCualitativa::model()->findAll();
            foreach ($modelProbabilidadCualitativa as $value) {
                if ($ProbabilidadProbable >= (double) $value->rango_inferior && $ProbabilidadProbable <= (double) $value->rango_superior) {
                    $probabilidadCualitativaValor = $value->valor;
                    $probabilidadCualitativaNombre = $value->nombre;
                }
            }
            $riesgoCualitativo = "";
            $aux = (double) $probabilidadCualitativaValor * (double) $impactoCualitativoValor;
            $modelRiesgoCualitativo = RiesgoCualitativo::model()->findAll();
            foreach ($modelRiesgoCualitativo as $value) {
                if ($aux >= (double) $value->rango_inferior && $aux <= (double) $value->rango_superior) {
                    $riesgoCualitativo = $value->nombre;
                }
            }

            $model = new Riesgo();

            $model->id_grupo_riesgo = $_POST['idGrupoRiesgoCrear'];
            $model->codigo = $_POST['codigoRiesgoCrear'];
            $model->nombre = $_POST['nombreRiesgoCrear'];
            $model->id_tipo_riesgo = $_POST['idTipoRiesgoCrear'];
            $model->id_tipo_perdida = $_POST['idTipoPerdidaCrear'];
            $model->descripcion_causa = $_POST['descripcionCausaCrear'];
            $model->id_actividad_control = $_POST['idActividadControlCrear'];
            $model->descripcion_actividad_control = $_POST['descripcionActividadControlCrear'];

            $model->impacto_pesimista = $_POST['impactoPesimistaCrear'];
            $model->impacto_probable = $_POST['impactoProbableCrear'];
            $model->impacto_optimista = $_POST['impactoOptimistaCrear'];

            $model->descripcion_impacto_pesimista = $_POST['descripcionImpactoPesimistaCrear'];
            $model->descripcion_impacto_probable = $_POST['descripcionImpactoProbableCrear'];
            $model->descripcion_impacto_optimista = $_POST['descripcionImpactoOptimistaCrear'];

            $model->probabilidad_pesimista = $_POST['probabilidadPesimistaCrear'];
            $model->probabilidad_probable = $_POST['probabilidadProbableCrear'];
            $model->probabilidad_optimista = $_POST['probabilidadOptimistaCrear'];

            $model->descripcion_probabilidad_pesimista = $_POST['descripcionProbabilidadPesimistaCrear'];
            $model->descripcion_probabilidad_probable = $_POST['descripcionProbabilidadProbableCrear'];
            $model->descripcion_probabilidad_optimista = $_POST['descripcionProbabilidadOptimistaCrear'];

            $model->impacto_deterministico = $impactoDeterministico;
            $model->probabilidad_deterministica = $probabilidadDeterministica;
            $model->riesgo_deterministico = $riesgoDeterministico;

            $model->impacto_cualitativo = $impactoCualitativoNombre;
            $model->probabilidad_cualitativa = $probabilidadCualitativaNombre;
            $model->riesgo_cualitativo = $riesgoCualitativo;
            $model->estado = 1;

            if ($model->save()) {

                foreach ($_POST['idCausaCrear'] as $value) {
                    $modelCausaRiesgo = new CausaRiesgo();
                    $modelCausaRiesgo->id_riesgo = $model->id_riesgo;
                    $modelCausaRiesgo->id_causa = $value;
                    $modelCausaRiesgo->save();
                }
                if (isset($_POST['idObjetivoEstrategicoCrear'])) {
                    foreach ($_POST['idObjetivoEstrategicoCrear'] as $value) {
                        $modelObjetivoEstrategicoRiesgo = new ObjetivoEstrategicoRiesgo();
                        $modelObjetivoEstrategicoRiesgo->id_riesgo = $model->id_riesgo;
                        $modelObjetivoEstrategicoRiesgo->id_objetivo_estrategico = $value;
                        $modelObjetivoEstrategicoRiesgo->save();
                    }
                }
                if (isset($_POST['idProcesoCrear'])) {
                    foreach ($_POST['idProcesoCrear'] as $value) {
                        $modelProcesoRiesgo = new ProcesoRiesgo();
                        $modelProcesoRiesgo->id_riesgo = $model->id_riesgo;
                        $modelProcesoRiesgo->id_proceso = $value;
                        $modelProcesoRiesgo->save();
                    }
                }

                foreach ($_POST['idUnidadNegocioCrear'] as $value) {
                    $modelRiesgoUnidadNegocio = new RiesgoUnidadNegocio();
                    $modelRiesgoUnidadNegocio->id_riesgo = $model->id_riesgo;
                    $modelRiesgoUnidadNegocio->id_unidad_negocio = $value;
                    $modelRiesgoUnidadNegocio->save();
                }
                $id_riesgo = $model->id_riesgo;
                $this->render('view', array(
                    'id_riesgo' => $id_riesgo,
                ));
            }
        }
        $this->render('create');
    }

    public function actionContarRiesgos() {
        $idGR = $_POST['idGR'];
        $riesgo = new Riesgo();
        $riesgoGrupoRiesgo = $riesgo->findAllByAttributes(array('id_grupo_riesgo' => $idGR));
        $contador = count($riesgoGrupoRiesgo) + 1;
        echo $contador;
    }

    public function actionReplicarCampos() {
        $idRiesgo = $_POST['idRiesgo'];
        $modelRiesgo = new Riesgo();
        $riesgo = $modelRiesgo->findByPk($idRiesgo);
        if ($_POST['tipoAccion'] != "" && $_POST['tipoAccion'] != "0") {
            $riesgo->id_tipo_accion = $_POST['tipoAccion'];
        } else {
            $riesgo->id_tipo_accion = null;
        }
        if ($_POST['accion'] != "") {
            $riesgo->accion = $_POST['accion'];
        } else {
            $riesgo->accion = "";
        }
        if ($_POST['indicadorRiesgo'] != "") {
            $riesgo->indicador_riesgo = $_POST['indicadorRiesgo'];
        } else {
            $riesgo->indicador_riesgo = "";
        }

        $riesgo->save();
        if ($_POST['tipoAccion'] != "" && $_POST['tipoAccion'] != "0") {
            $nombreTipoAccion = $riesgo->idTipoAccion->nombre;
            echo $nombreTipoAccion;
        } else {
            echo "";
        }
    }

    public function actionInhabilitar() {
        $idRiesgo = $_POST['idRiesgo'];
        $modelRiesgo = new Riesgo();
        $riesgo = $modelRiesgo->findByPk($idRiesgo);
        $riesgo->estado = 0;
        $riesgo->save();
    }

    public function actionHabilitar() {
        $idRiesgo = $_POST['idRiesgo'];
        $modelRiesgo = new Riesgo();
        $riesgo = $modelRiesgo->findByPk($idRiesgo);
        $riesgo->estado = 1;
        $riesgo->save();
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Riesgo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionRiesgoFiltradoPolar() {/* Este */
        $id = $_POST['id'];
        $id = (int) $id;
        $arregloFiltradoUN = [];
        $arregloIDGRFiltradoUN = [];
        $GrupoRiesgos = GrupoRiesgo::model()->findAll();

//    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
//    $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_unidad_negocio' => $id));
        for ($index1 = 0; $index1 < count($GrupoRiesgos); $index1++) {
            $arregloIDGRFiltradoUN[$index1] = $GrupoRiesgos[$index1]->id_grupo_riesgo;
        }
        for ($index2 = 0; $index2 < count($GrupoRiesgos); $index2++) {
            $arregloFiltradoUN[$index2] = DameTuCantidadFiltrada($arregloIDGRFiltradoUN[$index2], $id);
        }
        echo json_encode($arregloFiltradoUN);
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Riesgo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Riesgo']))
            $model->attributes = $_GET['Riesgo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Riesgo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Riesgo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Riesgo $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'riesgo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

function DameTuCantidadFiltrada($id, $idd) {/* Este */
    $cantidad = 0;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_unidad_negocio' => $idd));
    for ($index = 0; $index < count($riesgoss); $index++) {
        for ($index1 = 0; $index1 < count($riesgoUnidadNegocio); $index1++) {
            if ($riesgoss[$index]->id_riesgo == $riesgoUnidadNegocio[$index1]->id_riesgo && $riesgoss[$index]->id_grupo_riesgo == $id) {
                $cantidad = $cantidad + 1;
            }
        }
    }
    return $cantidad;
}
