<?php
/* @var $this PreguntaEspecificaController */
/* @var $model PreguntaEspecifica */

$this->breadcrumbs=array(
	'Pregunta Especificas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PreguntaEspecifica', 'url'=>array('index')),
	array('label'=>'Manage PreguntaEspecifica', 'url'=>array('admin')),
);
?>

<h1>Create PreguntaEspecifica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>