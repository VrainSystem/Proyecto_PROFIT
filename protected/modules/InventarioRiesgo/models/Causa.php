<?php

Yii::import('application.modules.InventarioRiesgo.models._base.BaseCausa');

class Causa extends BaseCausa
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}