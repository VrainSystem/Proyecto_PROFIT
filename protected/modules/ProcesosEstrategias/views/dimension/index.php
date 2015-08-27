<?php
/* @var $this DimensionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dimensions',
);

$this->menu=array(
	array('label'=>'Create Dimension', 'url'=>array('create')),
	array('label'=>'Manage Dimension', 'url'=>array('admin')),
);
?>

<h1>Dimensions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
