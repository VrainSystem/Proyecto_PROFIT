<?php
/* @var $this MacroprocesoController */
/* @var $model Macroproceso */

$this->breadcrumbs=array(
	'Macroprocesos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Macroproceso', 'url'=>array('index')),
	array('label'=>'Manage Macroproceso', 'url'=>array('admin')),
);
?>

<h1>Create Macroproceso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>