<?php
/* @var $this MacroprocesoController */
/* @var $model Macroproceso */

$this->breadcrumbs=array(
	'Macroprocesos'=>array('index'),
	$model->id_macroproceso=>array('view','id'=>$model->id_macroproceso),
	'Update',
);

$this->menu=array(
	array('label'=>'List Macroproceso', 'url'=>array('index')),
	array('label'=>'Create Macroproceso', 'url'=>array('create')),
	array('label'=>'View Macroproceso', 'url'=>array('view', 'id'=>$model->id_macroproceso)),
	array('label'=>'Manage Macroproceso', 'url'=>array('admin')),
);
?>

<h1>Update Macroproceso <?php echo $model->id_macroproceso; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>