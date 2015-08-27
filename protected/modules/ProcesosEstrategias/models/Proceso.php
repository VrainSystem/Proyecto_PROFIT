<?php

Yii::import('application.modules.ProcesosEstrategias.models._base.BaseProceso');

class Proceso extends BaseProceso
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}