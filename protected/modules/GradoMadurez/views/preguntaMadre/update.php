<?php
/* @var $this PreguntaMadreController */
/* @var $model PreguntaMadre */

$this->breadcrumbs=array(
	'Pregunta Madres'=>array('index'),
	$model->id_pregunta_madre=>array('view','id'=>$model->id_pregunta_madre),
	'Update',
);

$this->menu=array(
	array('label'=>'List PreguntaMadre', 'url'=>array('index')),
	array('label'=>'Create PreguntaMadre', 'url'=>array('create')),
	array('label'=>'View PreguntaMadre', 'url'=>array('view', 'id'=>$model->id_pregunta_madre)),
	array('label'=>'Manage PreguntaMadre', 'url'=>array('admin')),
);
?>

<h1>Update PreguntaMadre <?php echo $model->id_pregunta_madre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>