<?php
/* @var $this MacroprocesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Macroprocesos',
);

$this->menu=array(
	array('label'=>'Create Macroproceso', 'url'=>array('create')),
	array('label'=>'Manage Macroproceso', 'url'=>array('admin')),
);
?>

<h1>Macroprocesos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
