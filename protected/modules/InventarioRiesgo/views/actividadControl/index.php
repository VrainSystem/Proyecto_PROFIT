<?php
/* @var $this ActividadControlController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Actividad Controls',
);

$this->menu=array(
	array('label'=>'Create ActividadControl', 'url'=>array('create')),
	array('label'=>'Manage ActividadControl', 'url'=>array('admin')),
);
?>

<h1>Actividad Controls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
