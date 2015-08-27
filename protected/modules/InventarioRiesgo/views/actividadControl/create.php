<?php
/* @var $this ActividadControlController */
/* @var $model ActividadControl */

$this->breadcrumbs=array(
	'Actividad Controls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ActividadControl', 'url'=>array('index')),
	array('label'=>'Manage ActividadControl', 'url'=>array('admin')),
);
?>

<h1>Create ActividadControl</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>