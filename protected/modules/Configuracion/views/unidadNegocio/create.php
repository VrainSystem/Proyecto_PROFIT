<?php
/* @var $this UnidadNegocioController */
/* @var $model UnidadNegocio */

$this->breadcrumbs=array(
	'Unidad Negocios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UnidadNegocio', 'url'=>array('index')),
	array('label'=>'Manage UnidadNegocio', 'url'=>array('admin')),
);
?>

<h1>Create UnidadNegocio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>