<?php
/* @var $this TipoCausaController */
/* @var $model TipoCausa */

$this->breadcrumbs=array(
	'Tipo Causas'=>array('index'),
	$model->id_tipo_causa,
);

$this->menu=array(
	array('label'=>'List TipoCausa', 'url'=>array('index')),
	array('label'=>'Create TipoCausa', 'url'=>array('create')),
	array('label'=>'Update TipoCausa', 'url'=>array('update', 'id'=>$model->id_tipo_causa)),
	array('label'=>'Delete TipoCausa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_causa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoCausa', 'url'=>array('admin')),
);
?>

<h1>View TipoCausa #<?php echo $model->id_tipo_causa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_causa',
		'nombre',
	),
)); ?>
