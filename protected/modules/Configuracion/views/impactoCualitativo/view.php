<?php
/* @var $this ImpactoCualitativoController */
/* @var $model ImpactoCualitativo */

$this->breadcrumbs=array(
	'Impacto Cualitativos'=>array('index'),
	$model->id_impacto_cualitativo,
);

$this->menu=array(
	array('label'=>'List ImpactoCualitativo', 'url'=>array('index')),
	array('label'=>'Create ImpactoCualitativo', 'url'=>array('create')),
	array('label'=>'Update ImpactoCualitativo', 'url'=>array('update', 'id'=>$model->id_impacto_cualitativo)),
	array('label'=>'Delete ImpactoCualitativo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_impacto_cualitativo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImpactoCualitativo', 'url'=>array('admin')),
);
?>

<h1>View ImpactoCualitativo #<?php echo $model->id_impacto_cualitativo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_impacto_cualitativo',
		'rango_inferior',
		'rango_superior',
		'nombre',
		'valor',
	),
)); ?>
