<?php
/* @var $this TipoPerdidaController */
/* @var $model TipoPerdida */

$this->breadcrumbs=array(
	'Tipo Perdidas'=>array('index'),
	$model->id_tipo_perdida,
);

$this->menu=array(
	array('label'=>'List TipoPerdida', 'url'=>array('index')),
	array('label'=>'Create TipoPerdida', 'url'=>array('create')),
	array('label'=>'Update TipoPerdida', 'url'=>array('update', 'id'=>$model->id_tipo_perdida)),
	array('label'=>'Delete TipoPerdida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_perdida),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoPerdida', 'url'=>array('admin')),
);
?>

<h1>View TipoPerdida #<?php echo $model->id_tipo_perdida; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_perdida',
		'nombre',
	),
)); ?>
