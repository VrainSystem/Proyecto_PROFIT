<?php
/* @var $this CausaController */
/* @var $model Causa */

$this->breadcrumbs=array(
	'Causas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Causa', 'url'=>array('index')),
	array('label'=>'Manage Causa', 'url'=>array('admin')),
);
?>

<h1>Create Causa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>