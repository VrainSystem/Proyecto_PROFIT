<?php
/* @var $this PreguntaMadreController */
/* @var $model PreguntaMadre */

$this->breadcrumbs=array(
	'Pregunta Madres'=>array('index'),
	$model->id_pregunta_madre,
);

$this->menu=array(
	array('label'=>'List PreguntaMadre', 'url'=>array('index')),
	array('label'=>'Create PreguntaMadre', 'url'=>array('create')),
	array('label'=>'Update PreguntaMadre', 'url'=>array('update', 'id'=>$model->id_pregunta_madre)),
	array('label'=>'Delete PreguntaMadre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pregunta_madre),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreguntaMadre', 'url'=>array('admin')),
);
?>

<h1>View PreguntaMadre #<?php echo $model->id_pregunta_madre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pregunta_madre',
		'nombre',
		'descripcion',
		'id_grupo_preguntas',
	),
)); ?>
