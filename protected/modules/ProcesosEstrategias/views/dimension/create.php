<?php
/* @var $this DimensionController */
/* @var $model Dimension */

$this->breadcrumbs=array(
	'Dimensions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dimension', 'url'=>array('index')),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>Create Dimension</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>