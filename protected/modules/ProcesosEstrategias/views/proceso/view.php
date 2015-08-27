<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs=array(
	'Procesos'=>array('index'),
	$model->id_proceso,
);

$this->menu=array(
	array('label'=>'List Proceso', 'url'=>array('index')),
	array('label'=>'Create Proceso', 'url'=>array('create')),
	array('label'=>'Update Proceso', 'url'=>array('update', 'id'=>$model->id_proceso)),
	array('label'=>'Delete Proceso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proceso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proceso', 'url'=>array('admin')),
);
?>

<h1>View Proceso #<?php echo $model->id_proceso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_proceso',
		'nombre',
		'descripcion',
		'id_macroproceso',
		'nombre_responsable',
	),
)); ?>
