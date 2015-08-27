<?php
/* @var $this ProcesoController */
/* @var $model Proceso */

$this->breadcrumbs=array(
	'Procesos'=>array('index'),
	$model->id_proceso=>array('view','id'=>$model->id_proceso),
	'Update',
);

$this->menu=array(
	array('label'=>'List Proceso', 'url'=>array('index')),
	array('label'=>'Create Proceso', 'url'=>array('create')),
	array('label'=>'View Proceso', 'url'=>array('view', 'id'=>$model->id_proceso)),
	array('label'=>'Manage Proceso', 'url'=>array('admin')),
);
?>

<h1>Update Proceso <?php echo $model->id_proceso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>