<?php
/* @var $this ObjetivoEstrategicoController */
/* @var $model ObjetivoEstrategico */

$this->breadcrumbs=array(
	'Objetivo Estrategicos'=>array('index'),
	$model->id_objetivo_estrategico,
);

$this->menu=array(
	array('label'=>'List ObjetivoEstrategico', 'url'=>array('index')),
	array('label'=>'Create ObjetivoEstrategico', 'url'=>array('create')),
	array('label'=>'Update ObjetivoEstrategico', 'url'=>array('update', 'id'=>$model->id_objetivo_estrategico)),
	array('label'=>'Delete ObjetivoEstrategico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_objetivo_estrategico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ObjetivoEstrategico', 'url'=>array('admin')),
);
?>

<h1>View ObjetivoEstrategico #<?php echo $model->id_objetivo_estrategico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'codigo',
		'id_objetivo_estrategico',
		'id_dimension',
	),
)); ?>
