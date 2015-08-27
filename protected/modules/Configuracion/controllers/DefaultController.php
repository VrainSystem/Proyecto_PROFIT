<?php

Yii::import('application.modules.InventarioRiesgo.models._base.BaseRiesgo');
Yii::import('application.modules.InventarioRiesgo.models.*');

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCargarDatos() {
        $this->render('cargarDatos');
    }

    public function actionImportar() {
        $fila = 1;
        $arregloCSV = [];
        $contador = 0;
        if (($gestor = fopen("csv/riesgos.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 100000, ";")) !== FALSE) {
                $numero = count($datos);
//                echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
//                $arregloCSV[$contador] = $datos;
                $fila++;

                for ($c = 0; $c < $numero; $c++) {
                    $arregloCSV[$contador][$c] = $datos[$c];
                }
                $contador++;
            }
            fclose($gestor);
        }
        for ($index = 1; $index < count($arregloCSV); $index++) {
            $aux = $arregloCSV[$index][0];
            $aux = (int) $aux;
            $salvar = false;
            $riesgo = new Riesgo();
            $riesgo = $riesgo->findByAttributes(array('id_riesgo' => $aux));

            if ($arregloCSV[$index][19] != '') {
                $riesgo->impacto_estocastico = (double) $arregloCSV[$index][19];
//                $riesgo->save();
                $salvar = true;
            }
            if ($arregloCSV[$index][20] != '') {
                $riesgo->probabilidad_estocastica = (double) $arregloCSV[$index][20];
//                $riesgo->save();
                $salvar = true;
            }
            if ($arregloCSV[$index][21] != '') {
                $riesgo->riesgo_estocastico = (double) $arregloCSV[$index][21];
//                $riesgo->save();
                $salvar = true;
            }
            if ($arregloCSV[$index][27] != '') {
                $riesgo->desviacion_estandar = (double) $arregloCSV[$index][27];
//                $riesgo->save();
                $salvar = true;
            }

//            $riesgo->impacto_deterministico = $model->save();
//            $riesgos = Riesgo::model()->findAllByAttributes(array('id_riesgo' => $aux ));
//            echo $riesgos->nombre;
            if ($salvar) {
                $riesgo->save();
//                echo 'todo  ok';
            } else {
                
            }
        }
    }

    public function actionExportar() {
//
        header("Content-Type:text/html; charset=utf-8");
        $jsonData = "csv/riesgos.csv";
        unlink($jsonData);
        $text = '';
        $riesgo = new Riesgo();

        //      $riesgo = Riesgo::model()->findAllByAttributes(array('order' => 'id_riesgo ASC'));

        $riesgo = Riesgo::model()->findAll();
        $text = $text . 'ID Riesgo' . ';' .
                'Unidad Negocio' . ';' .
                'Código' . ';' .
                'Nombre' . ';' .
                'Tipo Riesgo' . ';' .
//                    $riesgo[$index]->descripcion_causa . ';' .
                'Tipo de Perdida' . ';' .
//                    $riesgo[$index]->descripcion_actividad_control . ';' .
                'Causa' . ';' .
                'Actividad de Control' . ';' .
                'Impacto Pesimista' . ';' .
                'Impacto Probable' . ';' .
                'Impacto Optimista' . ';' .
                'Probabilidad Pesimista' . ';' .
//                    $riesgo[$index]->descripcion_impacto_pesimista . ';' .
//                    $riesgo[$index]->descripcion_impacto_probable . ';' .
//                    $riesgo[$index]->descripcion_impacto_optimista . ';' .
//                    $riesgo[$index]->descripcion_probabilidad_pesimista . ';' .
//                    $riesgo[$index]->descripcion_probabilidad_probable . ';' .
//                    $riesgo[$index]->descripcion_probabilidad_optimista . ';' .
//                    $riesgo[$index]->id_tipo_accion . ';' .
                'Probabilidad Probable' . ';' .
                'Probabilidad Optimista' . ';' .
                'Acción' . ';' .
                'Impacto Determinístico' . ';' .
                'Probabilidad Determinística' . ';' .
                'Riesgo Determinístico' . ';' .
                'Impacto Estocástico' . ';' .
                'Probabilidad Estocástica' . ';' .
                'Riesgo Estocástico' . ';' .
                'Indicador Riesgo' . ';' .
                'Grupo Riesgo' . ';' .
                'Impacto Cualitativo' . ';' .
                'Probabilidad Cualitativa' . ';' .
                'Riesgo Cualitativo' . ';' .
                'Desviación Estándar' . ';' .
                'Estado' . ';' .
                PHP_EOL;
        if ($archivo = fopen($jsonData, "a+")) {
            fwrite($archivo, utf8_decode($text));
            fclose($archivo);
        }
        $text = '';

        for ($index = 0; $index < count($riesgo); $index++) {
            //UNIDADES DE NEGOCIO
            $unidadesNegocio = $riesgo[$index]->unidadNegocios;
            $unidedesNegocioNombres = "";
            for ($index1 = 0; $index1 < count($unidadesNegocio); $index1++) {
                if ($index1 === (count($unidadesNegocio) - 1)) {
                    $unidedesNegocioNombres = $unidedesNegocioNombres . $unidadesNegocio[$index1]->nombre;
                } else {
                    $unidedesNegocioNombres = $unidedesNegocioNombres . $unidadesNegocio[$index1]->nombre . ", ";
                }
            }
            //CAUSAS
            $causas = $riesgo[$index]->causas;
            $causasNombres = "";
            for ($index1 = 0; $index1 < count($causas); $index1++) {
                if ($index1 === (count($causas) - 1)) {
                    $causasNombres = $causasNombres . $causas[$index1]->nombre;
                } else {
                    $causasNombres = $causasNombres . $causas[$index1]->nombre . ", ";
                }
            }
            //UNIDADES DE NEGOCIO
            $estado = $riesgo[$index]->estado;
            $estadoNombre = "";

            if ($estado == 1) {
                $estadoNombre = "Activo";
            } else if ($estado == 0) {
                $estadoNombre = "Inactivo";
            }

            $text = $text . $riesgo[$index]->id_riesgo . ';' .
                    $unidedesNegocioNombres . ';' .
                    $riesgo[$index]->codigo . ';' .
                    $riesgo[$index]->nombre . ';' .
                    $riesgo[$index]->idTipoRiesgo->nombre . ';' .
                    $riesgo[$index]->idTipoPerdida->nombre . ';' .
                    $causasNombres . ';' .
                    $riesgo[$index]->idActividadControl->nombre . ';' .
                    $riesgo[$index]->impacto_pesimista . ';' .
                    $riesgo[$index]->impacto_probable . ';' .
                    $riesgo[$index]->impacto_optimista . ';' .
                    $riesgo[$index]->probabilidad_pesimista . ';' .
                    $riesgo[$index]->probabilidad_probable . ';' .
                    $riesgo[$index]->probabilidad_optimista . ';' .
////                    $riesgo[$index]->descripcion_causa . ';' .
////                    $riesgo[$index]->descripcion_actividad_control . ';' .
////                    $riesgo[$index]->descripcion_impacto_pesimista . ';' .
////                    $riesgo[$index]->descripcion_impacto_probable . ';' .
////                    $riesgo[$index]->descripcion_impacto_optimista . ';' .
////                    $riesgo[$index]->descripcion_probabilidad_pesimista . ';' .
////                    $riesgo[$index]->descripcion_probabilidad_probable . ';' .
////                    $riesgo[$index]->descripcion_probabilidad_optimista . ';' .
////                    $riesgo[$index]->id_tipo_accion . ';' .
                    $riesgo[$index]->accion . ';' .
                    $riesgo[$index]->impacto_deterministico . ';' .
                    $riesgo[$index]->probabilidad_deterministica . ';' .
                    $riesgo[$index]->riesgo_deterministico . ';' .
                    $riesgo[$index]->impacto_estocastico . ';' .
                    $riesgo[$index]->probabilidad_estocastica . ';' .
                    $riesgo[$index]->riesgo_estocastico . ';' .
                    $riesgo[$index]->indicador_riesgo . ';' .
                    $riesgo[$index]->idGrupoRiesgo->nombre . ';' .
                    $riesgo[$index]->impacto_cualitativo . ';' .
                    $riesgo[$index]->probabilidad_cualitativa . ';' .
                    $riesgo[$index]->riesgo_cualitativo . ';' .
                    $riesgo[$index]->desviacion_estandar . ';' .
                    $estadoNombre . ';' .
                    PHP_EOL;
            if ($archivo = fopen($jsonData, "a+")) {
                fwrite($archivo, utf8_decode($text));
                fclose($archivo);
            }

            $text = '';
        }
    }

// * @property integer $id_riesgo
// * @property string $codigo
// * @property integer $id_tipo_riesgo
// * @property integer $id_tipo_perdida
// * @property string $descripcion_causa
// * @property integer $id_actividad_control
// * @property string $descripcion_actividad_control
// * @property string $impacto_pesimista
// * @property string $impacto_probable
// * @property string $impacto_optimista
// * @property string $probabilidad_pesimista
// * @property string $probabilidad_probable
// * @property string $probabilidad_optimista
// * @property string $descripcion_impacto_pesimista
// * @property string $descripcion_impacto_probable
// * @property string $descripcion_impacto_optimista
// * @property string $descripcion_probabilidad_pesimista
// * @property string $descripcion_probabilidad_probable
// * @property string $descripcion_probabilidad_optimista
// * @property integer $id_tipo_accion
// * @property string $accion
// * @property double $impacto_deterministico
// * @property double $probabilidad_deterministica
// * @property double $riesgo_deterministico
// * @property double $impacto_estocastico
// * @property double $probabilidad_estocastica
// * @property double $riesgo_estocastico
// * @property string $indicador_riesgo
// * @property integer $id_grupo_riesgo
// * @property string $impacto_cualitativo
// 
// 
// * @property string $probabilidad_cualitativa
// * @property string $riesgo_cualitativo
// * @property integer $estado
// * @property string $nombre
}

//        echo $rodnier[0];
//        $conexion = "host='localhost' dbname='profit' port='5432' user='postgres' password='root'";
//        $url = pg_connect($conexion);
//        $query = "select * from usuario";
//        $result = pg_execute($url, $query);
//        echo '1111111111111';
//        pg_close($url);

//       
//    }
//}
