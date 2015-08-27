<?php
/* @var $this RiesgoCualitativoController */
/* @var $model RiesgoCualitativo */

$this->breadcrumbs=array(
	'Riesgo Cualitativos'=>array('index'),
	$model->id_riesgo_cualitativo=>array('view','id'=>$model->id_riesgo_cualitativo),
	'Update',
);

$this->menu=array(
	array('label'=>'List RiesgoCualitativo', 'url'=>array('index')),
	array('label'=>'Create RiesgoCualitativo', 'url'=>array('create')),
	array('label'=>'View RiesgoCualitativo', 'url'=>array('view', 'id'=>$model->id_riesgo_cualitativo)),
	array('label'=>'Manage RiesgoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Update RiesgoCualitativo <?php echo $model->id_riesgo_cualitativo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>