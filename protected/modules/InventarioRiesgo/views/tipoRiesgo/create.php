<?php
/* @var $this TipoRiesgoController */
/* @var $model TipoRiesgo */

$this->breadcrumbs=array(
	'Tipo Riesgos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoRiesgo', 'url'=>array('index')),
	array('label'=>'Manage TipoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Create TipoRiesgo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>