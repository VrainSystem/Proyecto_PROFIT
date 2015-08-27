<?php
/* @var $this ActividadControlController */
/* @var $model ActividadControl */

$this->breadcrumbs=array(
	'Actividad Controls'=>array('index'),
	$model->id_actividad_control=>array('view','id'=>$model->id_actividad_control),
	'Update',
);

$this->menu=array(
	array('label'=>'List ActividadControl', 'url'=>array('index')),
	array('label'=>'Create ActividadControl', 'url'=>array('create')),
	array('label'=>'View ActividadControl', 'url'=>array('view', 'id'=>$model->id_actividad_control)),
	array('label'=>'Manage ActividadControl', 'url'=>array('admin')),
);
?>

<h1>Update ActividadControl <?php echo $model->id_actividad_control; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>