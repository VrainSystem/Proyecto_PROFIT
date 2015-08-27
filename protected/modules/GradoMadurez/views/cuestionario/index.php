<?php
/* @var $this CuestionarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuestionarios',
);

$this->menu=array(
	array('label'=>'Create Cuestionario', 'url'=>array('create')),
	array('label'=>'Manage Cuestionario', 'url'=>array('admin')),
);
?>

<h1>Cuestionarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
