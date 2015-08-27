<?php

/**
 * This is the model base class for the table "riesgo_cualitativo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RiesgoCualitativo".
 *
 * Columns in table "riesgo_cualitativo" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id_riesgo_cualitativo
 * @property string $rango_inferior
 * @property string $rango_superior
 * @property string $nombre
 * @property string $color
 *
 */
abstract class BaseRiesgoCualitativo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'riesgo_cualitativo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'RiesgoCualitativo|RiesgoCualitativos', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('rango_inferior, rango_superior, nombre', 'required'),
			array('nombre', 'length', 'max'=>255),
			array('color', 'safe'),
			array('color', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_riesgo_cualitativo, rango_inferior, rango_superior, nombre, color', 'safe', 'on'=>'search'),
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
			'id_riesgo_cualitativo' => Yii::t('app', 'Id Riesgo Cualitativo'),
			'rango_inferior' => Yii::t('app', 'Rango Inferior'),
			'rango_superior' => Yii::t('app', 'Rango Superior'),
			'nombre' => Yii::t('app', 'Nombre'),
			'color' => Yii::t('app', 'Color'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_riesgo_cualitativo', $this->id_riesgo_cualitativo);
		$criteria->compare('rango_inferior', $this->rango_inferior, true);
		$criteria->compare('rango_superior', $this->rango_superior, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('color', $this->color, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}