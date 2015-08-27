<?php
/* @var $this ProbabilidadCualitativaController */
/* @var $model ProbabilidadCualitativa */

$this->breadcrumbs=array(
	'Probabilidad Cualitativas'=>array('index'),
	$model->id_probabilidad_cualitativa,
);

$this->menu=array(
	array('label'=>'List ProbabilidadCualitativa', 'url'=>array('index')),
	array('label'=>'Create ProbabilidadCualitativa', 'url'=>array('create')),
	array('label'=>'Update ProbabilidadCualitativa', 'url'=>array('update', 'id'=>$model->id_probabilidad_cualitativa)),
	array('label'=>'Delete ProbabilidadCualitativa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_probabilidad_cualitativa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProbabilidadCualitativa', 'url'=>array('admin')),
);
?>

<h1>View ProbabilidadCualitativa #<?php echo $model->id_probabilidad_cualitativa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_probabilidad_cualitativa',
		'rango_inferior',
		'rango_superior',
		'nombre',
		'valor',
	),
)); ?>
