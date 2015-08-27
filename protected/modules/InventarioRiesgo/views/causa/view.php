<?php
/* @var $this CausaController */
/* @var $model Causa */

$this->breadcrumbs=array(
	'Causas'=>array('index'),
	$model->id_causa,
);

$this->menu=array(
	array('label'=>'List Causa', 'url'=>array('index')),
	array('label'=>'Create Causa', 'url'=>array('create')),
	array('label'=>'Update Causa', 'url'=>array('update', 'id'=>$model->id_causa)),
	array('label'=>'Delete Causa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_causa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Causa', 'url'=>array('admin')),
);
?>

<h1>View Causa #<?php echo $model->id_causa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_causa',
		'nombre',
		'id_tipo_causa',
	),
)); ?>
