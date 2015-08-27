<?php
/* @var $this ObjetivoEstrategicoController */
/* @var $model ObjetivoEstrategico */

$this->breadcrumbs=array(
	'Objetivo Estrategicos'=>array('index'),
	$model->id_objetivo_estrategico=>array('view','id'=>$model->id_objetivo_estrategico),
	'Update',
);

$this->menu=array(
	array('label'=>'List ObjetivoEstrategico', 'url'=>array('index')),
	array('label'=>'Create ObjetivoEstrategico', 'url'=>array('create')),
	array('label'=>'View ObjetivoEstrategico', 'url'=>array('view', 'id'=>$model->id_objetivo_estrategico)),
	array('label'=>'Manage ObjetivoEstrategico', 'url'=>array('admin')),
);
?>

<h1>Update ObjetivoEstrategico <?php echo $model->id_objetivo_estrategico; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>