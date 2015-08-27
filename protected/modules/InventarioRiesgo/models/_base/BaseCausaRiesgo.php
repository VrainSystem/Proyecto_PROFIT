<?php

/**
 * This is the model base class for the table "causa_riesgo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CausaRiesgo".
 *
 * Columns in table "causa_riesgo" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id_causa
 * @property integer $id_riesgo
 *
 */
abstract class BaseCausaRiesgo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'causa_riesgo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CausaRiesgo|CausaRiesgos', $n);
	}

	public static function representingColumn() {
		return array(
			'id_causa',
			'id_riesgo',
		);
	}

	public function rules() {
		return array(
			array('id_causa, id_riesgo', 'required'),
			array('id_causa, id_riesgo', 'numerical', 'integerOnly'=>true),
			array('id_causa, id_riesgo', 'safe', 'on'=>'search'),
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
			'id_causa' => null,
			'id_riesgo' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_causa', $this->id_causa);
		$criteria->compare('id_riesgo', $this->id_riesgo);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}