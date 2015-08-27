<?php
/* @var $this RiesgoCualitativoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Riesgo Cualitativos',
);

$this->menu=array(
	array('label'=>'Create RiesgoCualitativo', 'url'=>array('create')),
	array('label'=>'Manage RiesgoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Riesgo Cualitativos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
