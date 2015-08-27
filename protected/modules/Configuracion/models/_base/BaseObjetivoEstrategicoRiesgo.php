<?php

/**
 * This is the model base class for the table "objetivo_estrategico_riesgo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ObjetivoEstrategicoRiesgo".
 *
 * Columns in table "objetivo_estrategico_riesgo" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id_objetivo_estrategico
 * @property integer $id_riesgo
 *
 */
abstract class BaseObjetivoEstrategicoRiesgo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'objetivo_estrategico_riesgo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ObjetivoEstrategicoRiesgo|ObjetivoEstrategicoRiesgos', $n);
	}

	public static function representingColumn() {
		return array(
			'id_objetivo_estrategico',
			'id_riesgo',
		);
	}

	public function rules() {
		return array(
			array('id_objetivo_estrategico, id_riesgo', 'required'),
			array('id_objetivo_estrategico, id_riesgo', 'numerical', 'integerOnly'=>true),
			array('id_objetivo_estrategico, id_riesgo', 'safe', 'on'=>'search'),
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
			'id_objetivo_estrategico' => null,
			'id_riesgo' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_objetivo_estrategico', $this->id_objetivo_estrategico);
		$criteria->compare('id_riesgo', $this->id_riesgo);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}