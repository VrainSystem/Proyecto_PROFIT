<?php
/* @var $this CausaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Causas',
);

$this->menu=array(
	array('label'=>'Create Causa', 'url'=>array('create')),
	array('label'=>'Manage Causa', 'url'=>array('admin')),
);
?>

<h1>Causas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
