<?php
/* @var $this UnidadNegocioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unidad Negocios',
);

$this->menu=array(
	array('label'=>'Create UnidadNegocio', 'url'=>array('create')),
	array('label'=>'Manage UnidadNegocio', 'url'=>array('admin')),
);
?>

<h1>Unidad Negocios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
