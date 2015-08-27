<?php

/**
 * This is the model base class for the table "pregunta_especifica".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PreguntaEspecifica".
 *
 * Columns in table "pregunta_especifica" available as properties of the model,
 * followed by relations of table "pregunta_especifica" available as properties of the model.
 *
 * @property integer $id_pregunta_especifica
 * @property string $pregunta
 * @property integer $complimiento
 * @property integer $id_pregunta_madre
 *
 * @property PreguntaMadre $idPreguntaMadre
 */
abstract class BasePreguntaEspecifica extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pregunta_especifica';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PreguntaEspecifica|PreguntaEspecificas', $n);
	}

	public static function representingColumn() {
		return 'pregunta';
	}

	public function rules() {
		return array(
			array('pregunta, complimiento, id_pregunta_madre', 'required'),
			array('complimiento, id_pregunta_madre', 'numerical', 'integerOnly'=>true),
			array('pregunta', 'length', 'max'=>255),
			array('id_pregunta_especifica, pregunta, complimiento, id_pregunta_madre', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idPreguntaMadre' => array(self::BELONGS_TO, 'PreguntaMadre', 'id_pregunta_madre'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_pregunta_especifica' => Yii::t('app', 'Id Pregunta Especifica'),
			'pregunta' => Yii::t('app', 'Pregunta'),
			'complimiento' => Yii::t('app', 'Complimiento'),
			'id_pregunta_madre' => null,
			'idPreguntaMadre' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_pregunta_especifica', $this->id_pregunta_especifica);
		$criteria->compare('pregunta', $this->pregunta, true);
		$criteria->compare('complimiento', $this->complimiento);
		$criteria->compare('id_pregunta_madre', $this->id_pregunta_madre);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}