<?php

/**
 * This is the model base class for the table "riesgo_unidad_negocio".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RiesgoUnidadNegocio".
 *
 * Columns in table "riesgo_unidad_negocio" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id_riesgo
 * @property integer $id_unidad_negocio
 *
 */
abstract class BaseRiesgoUnidadNegocio extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'riesgo_unidad_negocio';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'RiesgoUnidadNegocio|RiesgoUnidadNegocios', $n);
	}

	public static function representingColumn() {
		return array(
			'id_riesgo',
			'id_unidad_negocio',
		);
	}

	public function rules() {
		return array(
			array('id_riesgo, id_unidad_negocio', 'required'),
			array('id_riesgo, id_unidad_negocio', 'numerical', 'integerOnly'=>true),
			array('id_riesgo, id_unidad_negocio', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_riesgo' => null,
			'id_unidad_negocio' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_riesgo', $this->id_riesgo);
		$criteria->compare('id_unidad_negocio', $this->id_unidad_negocio);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}