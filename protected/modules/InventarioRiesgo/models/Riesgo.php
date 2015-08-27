<?php

Yii::import('application.modules.InventarioRiesgo.models._base.BaseRiesgo');
Yii::import('application.modules.InventarioRiesgo.models.*');

class Riesgo extends BaseRiesgo {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rodnier() {
        $arregloRiesgos = $this->model()->findAll();
        return $arregloRiesgos;
    }

    public function filtrarUnidadNegocio($unidadNegocio) {

//      select count(*) from  riesgo 
//inner join riesgo_unidad_negocio on riesgo.id_riesgo=riesgo_unidad_negocio.id_riesgo
//and riesgo_unidad_negocio.id_unidad_negocio=14  
    }

}
