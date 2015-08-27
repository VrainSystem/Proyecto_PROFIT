<?php
/* @var $this ProbabilidadCualitativaController */
/* @var $model ProbabilidadCualitativa */

$this->breadcrumbs=array(
	'Probabilidad Cualitativas'=>array('index'),
	$model->id_probabilidad_cualitativa=>array('view','id'=>$model->id_probabilidad_cualitativa),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProbabilidadCualitativa', 'url'=>array('index')),
	array('label'=>'Create ProbabilidadCualitativa', 'url'=>array('create')),
	array('label'=>'View ProbabilidadCualitativa', 'url'=>array('view', 'id'=>$model->id_probabilidad_cualitativa)),
	array('label'=>'Manage ProbabilidadCualitativa', 'url'=>array('admin')),
);
?>

<h1>Update ProbabilidadCualitativa <?php echo $model->id_probabilidad_cualitativa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>