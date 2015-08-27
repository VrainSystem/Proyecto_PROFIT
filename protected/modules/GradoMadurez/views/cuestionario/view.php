<?php
/* @var $this CuestionarioController */
/* @var $model Cuestionario */

$this->breadcrumbs=array(
	'Cuestionarios'=>array('index'),
	$model->id_cuestionario,
);

$this->menu=array(
	array('label'=>'List Cuestionario', 'url'=>array('index')),
	array('label'=>'Create Cuestionario', 'url'=>array('create')),
	array('label'=>'Update Cuestionario', 'url'=>array('update', 'id'=>$model->id_cuestionario)),
	array('label'=>'Delete Cuestionario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cuestionario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cuestionario', 'url'=>array('admin')),
);
?>

<h1>View Cuestionario #<?php echo $model->id_cuestionario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cuestionario',
		'nombre',
		'grado_madurez',
		'descripcion',
		'id_unidad_negocio',
	),
)); ?>
