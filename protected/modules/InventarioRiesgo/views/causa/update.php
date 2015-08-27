<?php
/* @var $this CausaController */
/* @var $model Causa */

$this->breadcrumbs=array(
	'Causas'=>array('index'),
	$model->id_causa=>array('view','id'=>$model->id_causa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Causa', 'url'=>array('index')),
	array('label'=>'Create Causa', 'url'=>array('create')),
	array('label'=>'View Causa', 'url'=>array('view', 'id'=>$model->id_causa)),
	array('label'=>'Manage Causa', 'url'=>array('admin')),
);
?>

<h1>Update Causa <?php echo $model->id_causa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>