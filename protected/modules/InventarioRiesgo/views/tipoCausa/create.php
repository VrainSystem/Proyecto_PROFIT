<?php
/* @var $this TipoCausaController */
/* @var $model TipoCausa */

$this->breadcrumbs=array(
	'Tipo Causas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoCausa', 'url'=>array('index')),
	array('label'=>'Manage TipoCausa', 'url'=>array('admin')),
);
?>

<h1>Create TipoCausa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>