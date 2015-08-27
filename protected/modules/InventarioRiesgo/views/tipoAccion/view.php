<?php
/* @var $this TipoAccionController */
/* @var $model TipoAccion */

$this->breadcrumbs=array(
	'Tipo Accions'=>array('index'),
	$model->id_tipo_accion,
);

$this->menu=array(
	array('label'=>'List TipoAccion', 'url'=>array('index')),
	array('label'=>'Create TipoAccion', 'url'=>array('create')),
	array('label'=>'Update TipoAccion', 'url'=>array('update', 'id'=>$model->id_tipo_accion)),
	array('label'=>'Delete TipoAccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_accion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoAccion', 'url'=>array('admin')),
);
?>

<h1>View TipoAccion #<?php echo $model->id_tipo_accion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_accion',
		'nombre',
	),
)); ?>
