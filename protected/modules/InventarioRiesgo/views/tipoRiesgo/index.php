<?php
/* @var $this TipoRiesgoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Riesgos',
);

$this->menu=array(
	array('label'=>'Create TipoRiesgo', 'url'=>array('create')),
	array('label'=>'Manage TipoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Tipo Riesgos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
