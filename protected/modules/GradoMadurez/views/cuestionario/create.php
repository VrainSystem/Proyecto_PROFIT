<?php
/* @var $this CuestionarioController */
/* @var $model Cuestionario */

$this->breadcrumbs=array(
	'Cuestionarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cuestionario', 'url'=>array('index')),
	array('label'=>'Manage Cuestionario', 'url'=>array('admin')),
);
?>

<h1>Create Cuestionario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>