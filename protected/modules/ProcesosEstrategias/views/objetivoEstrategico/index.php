<?php
/* @var $this ObjetivoEstrategicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Objetivo Estrategicos',
);

$this->menu=array(
	array('label'=>'Create ObjetivoEstrategico', 'url'=>array('create')),
	array('label'=>'Manage ObjetivoEstrategico', 'url'=>array('admin')),
);
?>

<h1>Objetivo Estrategicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
