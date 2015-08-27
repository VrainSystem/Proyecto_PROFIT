<?php
/* @var $this ProbabilidadCualitativaController */
/* @var $model ProbabilidadCualitativa */

$this->breadcrumbs=array(
	'Probabilidad Cualitativas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProbabilidadCualitativa', 'url'=>array('index')),
	array('label'=>'Manage ProbabilidadCualitativa', 'url'=>array('admin')),
);
?>

<h1>Create ProbabilidadCualitativa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>