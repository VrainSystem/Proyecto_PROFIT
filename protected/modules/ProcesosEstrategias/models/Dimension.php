<?php

Yii::import('application.modules.ProcesosEstrategias.models._base.BaseDimension');
Yii::import('application.modules.Configuracion.models._base.BaseEmpresa');

class Dimension extends BaseDimension {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
