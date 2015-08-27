<?php
/* @var $this RiesgoCualitativoController */
/* @var $model RiesgoCualitativo */

$this->breadcrumbs=array(
	'Riesgo Cualitativos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RiesgoCualitativo', 'url'=>array('index')),
	array('label'=>'Manage RiesgoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Create RiesgoCualitativo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>