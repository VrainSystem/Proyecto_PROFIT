<?php
/* @var $this TipoPerdidaController */
/* @var $model TipoPerdida */

$this->breadcrumbs=array(
	'Tipo Perdidas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoPerdida', 'url'=>array('index')),
	array('label'=>'Manage TipoPerdida', 'url'=>array('admin')),
);
?>

<h1>Create TipoPerdida</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>