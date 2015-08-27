<?php
/* @var $this GrupoRiesgoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupo Riesgos',
);

$this->menu=array(
	array('label'=>'Create GrupoRiesgo', 'url'=>array('create')),
	array('label'=>'Manage GrupoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Grupo Riesgos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
