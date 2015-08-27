<?php
/* @var $this TipoCausaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Causas',
);

$this->menu=array(
	array('label'=>'Create TipoCausa', 'url'=>array('create')),
	array('label'=>'Manage TipoCausa', 'url'=>array('admin')),
);
?>

<h1>Tipo Causas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
