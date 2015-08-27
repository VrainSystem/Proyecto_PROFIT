<?php
/* @var $this ActividadControlController */
/* @var $model ActividadControl */

$this->breadcrumbs=array(
	'Actividad Controls'=>array('index'),
	$model->id_actividad_control,
);

$this->menu=array(
	array('label'=>'List ActividadControl', 'url'=>array('index')),
	array('label'=>'Create ActividadControl', 'url'=>array('create')),
	array('label'=>'Update ActividadControl', 'url'=>array('update', 'id'=>$model->id_actividad_control)),
	array('label'=>'Delete ActividadControl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_actividad_control),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ActividadControl', 'url'=>array('admin')),
);
?>

<h1>View ActividadControl #<?php echo $model->id_actividad_control; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_actividad_control',
		'nombre',
	),
)); ?>
