<?php
/* @var $this GrupoPreguntasController */
/* @var $model GrupoPreguntas */

$this->breadcrumbs=array(
	'Grupo Preguntases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GrupoPreguntas', 'url'=>array('index')),
	array('label'=>'Manage GrupoPreguntas', 'url'=>array('admin')),
);
?>

<h1>Create GrupoPreguntas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>