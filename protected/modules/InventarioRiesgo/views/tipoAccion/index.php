<?php
/* @var $this TipoAccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Accions',
);

$this->menu=array(
	array('label'=>'Create TipoAccion', 'url'=>array('create')),
	array('label'=>'Manage TipoAccion', 'url'=>array('admin')),
);
?>

<h1>Tipo Accions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
