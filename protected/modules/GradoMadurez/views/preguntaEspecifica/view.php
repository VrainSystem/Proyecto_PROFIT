<?php
/* @var $this PreguntaEspecificaController */
/* @var $model PreguntaEspecifica */

$this->breadcrumbs=array(
	'Pregunta Especificas'=>array('index'),
	$model->id_pregunta_especifica,
);

$this->menu=array(
	array('label'=>'List PreguntaEspecifica', 'url'=>array('index')),
	array('label'=>'Create PreguntaEspecifica', 'url'=>array('create')),
	array('label'=>'Update PreguntaEspecifica', 'url'=>array('update', 'id'=>$model->id_pregunta_especifica)),
	array('label'=>'Delete PreguntaEspecifica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pregunta_especifica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreguntaEspecifica', 'url'=>array('admin')),
);
?>

<h1>View PreguntaEspecifica #<?php echo $model->id_pregunta_especifica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pregunta_especifica',
		'pregunta',
		'complimiento',
		'id_pregunta_madre',
	),
)); ?>
