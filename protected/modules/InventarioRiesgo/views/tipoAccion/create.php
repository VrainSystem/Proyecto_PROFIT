<?php
/* @var $this TipoAccionController */
/* @var $model TipoAccion */

$this->breadcrumbs=array(
	'Tipo Accions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoAccion', 'url'=>array('index')),
	array('label'=>'Manage TipoAccion', 'url'=>array('admin')),
);
?>

<h1>Create TipoAccion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>