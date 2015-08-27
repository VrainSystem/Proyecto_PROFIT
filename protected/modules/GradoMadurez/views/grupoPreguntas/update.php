<?php
/* @var $this GrupoPreguntasController */
/* @var $model GrupoPreguntas */

$this->breadcrumbs=array(
	'Grupo Preguntases'=>array('index'),
	$model->id_grupo_preguntas=>array('view','id'=>$model->id_grupo_preguntas),
	'Update',
);

$this->menu=array(
	array('label'=>'List GrupoPreguntas', 'url'=>array('index')),
	array('label'=>'Create GrupoPreguntas', 'url'=>array('create')),
	array('label'=>'View GrupoPreguntas', 'url'=>array('view', 'id'=>$model->id_grupo_preguntas)),
	array('label'=>'Manage GrupoPreguntas', 'url'=>array('admin')),
);
?>

<h1>Update GrupoPreguntas <?php echo $model->id_grupo_preguntas; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>