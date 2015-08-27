<?php

Yii::import('application.modules.Configuracion.models.*');

class ProcesoController extends Controller {

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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Proceso();
        $model->nombre = $_POST['nombreProceso'];
        $model->descripcion = $_POST['descripcionProceso'];
        $model->id_macroproceso = $_POST['idMacroProceso'];
        $model->save();
        $i = 0;
        foreach ($_POST['unidadesNIds'] as $value) {
            $modelUNP = new UnidadNegocioProceso();
            $modelUNP->id_proceso = $model->id_proceso;
            $modelUNP->id_unidad_negocio = (int) $value;
            $modelUNP->nombre_responsable = $_POST['responsables'][$i];
            $modelUNP->save();
        }
    }

    public function actionUnidadNegocioMacroproceso() {
        $model = UnidadNegocioMacroproceso::model()->findAllByAttributes(array('id_macroproceso' => $_POST['idMacroproceso']));
        $array = array();
        foreach ($model as $value) {
            $unidadNegocio = UnidadNegocio::model()->findByPk($value->id_unidad_negocio);
            $array1 = array("id_unidad_negocio" => $unidadNegocio->id_unidad_negocio, "nombre" => $unidadNegocio->nombre);
            array_push($array, $array1);
        }
        $json = json_encode($array);
        echo $json;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $modelProceso = new Proceso;
        $model = $modelProceso->findByPk($_POST['idProcesoEditar']);
        $model->nombre = $_POST['nombreProcesoEdit'];
        $model->descripcion = $_POST['descripcionProcesoEdit'];
        $model->id_macroproceso = $_POST['idMacroProcesoEdit'];
        $model->save();
        $this->redirect(array('default/index'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete() {
        $id = $_POST['idDeleteProceso'];

        $this->loadModel($id)->delete();
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        $this->redirect(array('default/index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Proceso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Proceso('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Proceso']))
            $model->attributes = $_GET['Proceso'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Proceso the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Proceso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Proceso $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'proceso-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}