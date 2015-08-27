<?php
/* @var $this PreguntaMadreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pregunta Madres',
);

$this->menu=array(
	array('label'=>'Create PreguntaMadre', 'url'=>array('create')),
	array('label'=>'Manage PreguntaMadre', 'url'=>array('admin')),
);
?>

<h1>Pregunta Madres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
