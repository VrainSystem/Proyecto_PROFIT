<?php

/**
 * This is the model base class for the table "pregunta_madre".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PreguntaMadre".
 *
 * Columns in table "pregunta_madre" available as properties of the model,
 * followed by relations of table "pregunta_madre" available as properties of the model.
 *
 * @property integer $id_pregunta_madre
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_grupo_preguntas
 *
 * @property PreguntaEspecifica[] $preguntaEspecificas
 * @property GrupoPreguntas $idGrupoPreguntas
 */
abstract class BasePreguntaMadre extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'pregunta_madre';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PreguntaMadre|PreguntaMadres', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('nombre, id_grupo_preguntas', 'required'),
			array('id_grupo_preguntas', 'numerical', 'integerOnly'=>true),
			array('nombre, descripcion', 'length', 'max'=>255),
			array('descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_pregunta_madre, nombre, descripcion, id_grupo_preguntas', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'preguntaEspecificas' => array(self::HAS_MANY, 'PreguntaEspecifica', 'id_pregunta_madre'),
			'idGrupoPreguntas' => array(self::BELONGS_TO, 'GrupoPreguntas', 'id_grupo_preguntas'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_pregunta_madre' => Yii::t('app', 'Id Pregunta Madre'),
			'nombre' => Yii::t('app', 'Nombre'),
			'descripcion' => Yii::t('app', 'Descripcion'),
			'id_grupo_preguntas' => null,
			'preguntaEspecificas' => null,
			'idGrupoPreguntas' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_pregunta_madre', $this->id_pregunta_madre);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('descripcion', $this->descripcion, true);
		$criteria->compare('id_grupo_preguntas', $this->id_grupo_preguntas);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}