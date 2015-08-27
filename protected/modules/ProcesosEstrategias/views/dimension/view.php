<?php
/* @var $this DimensionController */
/* @var $model Dimension */

$this->breadcrumbs=array(
	'Dimensions'=>array('index'),
	$model->id_dimension,
);

$this->menu=array(
	array('label'=>'List Dimension', 'url'=>array('index')),
	array('label'=>'Create Dimension', 'url'=>array('create')),
	array('label'=>'Update Dimension', 'url'=>array('update', 'id'=>$model->id_dimension)),
	array('label'=>'Delete Dimension', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dimension),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>View Dimension #<?php echo $model->id_dimension; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dimension',
		'nombre',
		'id_empresa',
	),
)); ?>
