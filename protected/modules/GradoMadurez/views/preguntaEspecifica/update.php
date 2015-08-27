<?php
/* @var $this PreguntaEspecificaController */
/* @var $model PreguntaEspecifica */

$this->breadcrumbs=array(
	'Pregunta Especificas'=>array('index'),
	$model->id_pregunta_especifica=>array('view','id'=>$model->id_pregunta_especifica),
	'Update',
);

$this->menu=array(
	array('label'=>'List PreguntaEspecifica', 'url'=>array('index')),
	array('label'=>'Create PreguntaEspecifica', 'url'=>array('create')),
	array('label'=>'View PreguntaEspecifica', 'url'=>array('view', 'id'=>$model->id_pregunta_especifica)),
	array('label'=>'Manage PreguntaEspecifica', 'url'=>array('admin')),
);
?>

<h1>Update PreguntaEspecifica <?php echo $model->id_pregunta_especifica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>