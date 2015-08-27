<?php
/* @var $this CuestionarioController */
/* @var $model Cuestionario */

$this->breadcrumbs=array(
	'Cuestionarios'=>array('index'),
	$model->id_cuestionario=>array('view','id'=>$model->id_cuestionario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cuestionario', 'url'=>array('index')),
	array('label'=>'Create Cuestionario', 'url'=>array('create')),
	array('label'=>'View Cuestionario', 'url'=>array('view', 'id'=>$model->id_cuestionario)),
	array('label'=>'Manage Cuestionario', 'url'=>array('admin')),
);
?>

<h1>Update Cuestionario <?php echo $model->id_cuestionario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>