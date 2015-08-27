<?php
/* @var $this ImpactoCualitativoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Impacto Cualitativos',
);

$this->menu=array(
	array('label'=>'Create ImpactoCualitativo', 'url'=>array('create')),
	array('label'=>'Manage ImpactoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Impacto Cualitativos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
