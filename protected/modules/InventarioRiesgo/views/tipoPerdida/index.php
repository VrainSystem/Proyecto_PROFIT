<?php
/* @var $this TipoPerdidaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Perdidas',
);

$this->menu=array(
	array('label'=>'Create TipoPerdida', 'url'=>array('create')),
	array('label'=>'Manage TipoPerdida', 'url'=>array('admin')),
);
?>

<h1>Tipo Perdidas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
