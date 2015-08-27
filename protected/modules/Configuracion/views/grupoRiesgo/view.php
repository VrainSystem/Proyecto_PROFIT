<?php
/* @var $this GrupoRiesgoController */
/* @var $model GrupoRiesgo */

$this->breadcrumbs=array(
	'Grupo Riesgos'=>array('index'),
	$model->id_grupo_riesgo,
);

$this->menu=array(
	array('label'=>'List GrupoRiesgo', 'url'=>array('index')),
	array('label'=>'Create GrupoRiesgo', 'url'=>array('create')),
	array('label'=>'Update GrupoRiesgo', 'url'=>array('update', 'id'=>$model->id_grupo_riesgo)),
	array('label'=>'Delete GrupoRiesgo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grupo_riesgo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GrupoRiesgo', 'url'=>array('admin')),
);
?>

<h1>View GrupoRiesgo #<?php echo $model->id_grupo_riesgo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_grupo_riesgo',
		'nombre',
		'codigo',
		'descripcion',
	),
)); ?>
