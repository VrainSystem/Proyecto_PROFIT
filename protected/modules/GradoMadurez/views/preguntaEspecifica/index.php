<?php
/* @var $this PreguntaEspecificaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pregunta Especificas',
);

$this->menu=array(
	array('label'=>'Create PreguntaEspecifica', 'url'=>array('create')),
	array('label'=>'Manage PreguntaEspecifica', 'url'=>array('admin')),
);
?>

<h1>Pregunta Especificas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
