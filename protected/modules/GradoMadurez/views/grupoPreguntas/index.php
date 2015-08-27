<?php
/* @var $this GrupoPreguntasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupo Preguntases',
);

$this->menu=array(
	array('label'=>'Create GrupoPreguntas', 'url'=>array('create')),
	array('label'=>'Manage GrupoPreguntas', 'url'=>array('admin')),
);
?>

<h1>Grupo Preguntases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
