<?php
/* @var $this GrupoRiesgoController */
/* @var $model GrupoRiesgo */

$this->breadcrumbs=array(
	'Grupo Riesgos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GrupoRiesgo', 'url'=>array('index')),
	array('label'=>'Manage GrupoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Create GrupoRiesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>