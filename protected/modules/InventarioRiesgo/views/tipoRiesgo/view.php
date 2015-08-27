<?php
/* @var $this TipoRiesgoController */
/* @var $model TipoRiesgo */

$this->breadcrumbs=array(
	'Tipo Riesgos'=>array('index'),
	$model->id_tipo_riesgo,
);

$this->menu=array(
	array('label'=>'List TipoRiesgo', 'url'=>array('index')),
	array('label'=>'Create TipoRiesgo', 'url'=>array('create')),
	array('label'=>'Update TipoRiesgo', 'url'=>array('update', 'id'=>$model->id_tipo_riesgo)),
	array('label'=>'Delete TipoRiesgo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_riesgo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoRiesgo', 'url'=>array('admin')),
);
?>

<h1>View TipoRiesgo #<?php echo $model->id_tipo_riesgo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_riesgo',
		'nombre',
	),
)); ?>
