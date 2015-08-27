<?php
/* @var $this PreguntaMadreController */
/* @var $model PreguntaMadre */

$this->breadcrumbs=array(
	'Pregunta Madres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PreguntaMadre', 'url'=>array('index')),
	array('label'=>'Manage PreguntaMadre', 'url'=>array('admin')),
);
?>

<h1>Create PreguntaMadre</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>