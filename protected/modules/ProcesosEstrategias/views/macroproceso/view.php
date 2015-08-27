<?php
/* @var $this MacroprocesoController */
/* @var $model Macroproceso */

$this->breadcrumbs=array(
	'Macroprocesos'=>array('index'),
	$model->id_macroproceso,
);

$this->menu=array(
	array('label'=>'List Macroproceso', 'url'=>array('index')),
	array('label'=>'Create Macroproceso', 'url'=>array('create')),
	array('label'=>'Update Macroproceso', 'url'=>array('update', 'id'=>$model->id_macroproceso)),
	array('label'=>'Delete Macroproceso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_macroproceso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Macroproceso', 'url'=>array('admin')),
);
?>

<h1>View Macroproceso #<?php echo $model->id_macroproceso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_macroproceso',
		'nombre',
		'descripcion',
		'nombre_responsable',
	),
)); ?>
