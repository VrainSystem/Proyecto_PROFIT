<?php
/* @var $this ProbabilidadCualitativaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Probabilidad Cualitativas',
);

$this->menu=array(
	array('label'=>'Create ProbabilidadCualitativa', 'url'=>array('create')),
	array('label'=>'Manage ProbabilidadCualitativa', 'url'=>array('admin')),
);
?>

<h1>Probabilidad Cualitativas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
