<?php
/* @var $this GrupoPreguntasController */
/* @var $model GrupoPreguntas */

$this->breadcrumbs=array(
	'Grupo Preguntases'=>array('index'),
	$model->id_grupo_preguntas,
);

$this->menu=array(
	array('label'=>'List GrupoPreguntas', 'url'=>array('index')),
	array('label'=>'Create GrupoPreguntas', 'url'=>array('create')),
	array('label'=>'Update GrupoPreguntas', 'url'=>array('update', 'id'=>$model->id_grupo_preguntas)),
	array('label'=>'Delete GrupoPreguntas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_grupo_preguntas),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GrupoPreguntas', 'url'=>array('admin')),
);
?>

<h1>View GrupoPreguntas #<?php echo $model->id_grupo_preguntas; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_grupo_preguntas',
		'nombre',
		'descripcion',
		'id_cuestionario',
	),
)); ?>
