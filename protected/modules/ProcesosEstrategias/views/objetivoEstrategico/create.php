<?php
/* @var $this ObjetivoEstrategicoController */
/* @var $model ObjetivoEstrategico */

$this->breadcrumbs=array(
	'Objetivo Estrategicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ObjetivoEstrategico', 'url'=>array('index')),
	array('label'=>'Manage ObjetivoEstrategico', 'url'=>array('admin')),
);
?>

<h1>Create ObjetivoEstrategico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>