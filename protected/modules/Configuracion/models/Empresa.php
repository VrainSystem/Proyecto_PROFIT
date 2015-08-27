<?php

Yii::import('application.modules.Configuracion.models._base.BaseEmpresa');

class Empresa extends BaseEmpresa
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}