<?php
/* @var $this ImpactoCualitativoController */
/* @var $model ImpactoCualitativo */

$this->breadcrumbs=array(
	'Impacto Cualitativos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImpactoCualitativo', 'url'=>array('index')),
	array('label'=>'Manage ImpactoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Create ImpactoCualitativo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>