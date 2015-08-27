<?php
/* @var $this DimensionController */
/* @var $model Dimension */

$this->breadcrumbs=array(
	'Dimensions'=>array('index'),
	$model->id_dimension=>array('view','id'=>$model->id_dimension),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dimension', 'url'=>array('index')),
	array('label'=>'Create Dimension', 'url'=>array('create')),
	array('label'=>'View Dimension', 'url'=>array('view', 'id'=>$model->id_dimension)),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>Update Dimension <?php echo $model->id_dimension; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>