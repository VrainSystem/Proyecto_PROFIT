<?php
/* @var $this RiesgoCualitativoController */
/* @var $model RiesgoCualitativo */

$this->breadcrumbs=array(
	'Riesgo Cualitativos'=>array('index'),
	$model->id_riesgo_cualitativo,
);

$this->menu=array(
	array('label'=>'List RiesgoCualitativo', 'url'=>array('index')),
	array('label'=>'Create RiesgoCualitativo', 'url'=>array('create')),
	array('label'=>'Update RiesgoCualitativo', 'url'=>array('update', 'id'=>$model->id_riesgo_cualitativo)),
	array('label'=>'Delete RiesgoCualitativo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_riesgo_cualitativo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RiesgoCualitativo', 'url'=>array('admin')),
);
?>

<h1>View RiesgoCualitativo #<?php echo $model->id_riesgo_cualitativo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_riesgo_cualitativo',
		'rango_inferior',
		'rango_superior',
		'nombre',
		'valor',
	),
)); ?>
