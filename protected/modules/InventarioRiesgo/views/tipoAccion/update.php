<?php
/* @var $this TipoAccionController */
/* @var $model TipoAccion */

$this->breadcrumbs=array(
	'Tipo Accions'=>array('index'),
	$model->id_tipo_accion=>array('view','id'=>$model->id_tipo_accion),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoAccion', 'url'=>array('index')),
	array('label'=>'Create TipoAccion', 'url'=>array('create')),
	array('label'=>'View TipoAccion', 'url'=>array('view', 'id'=>$model->id_tipo_accion)),
	array('label'=>'Manage TipoAccion', 'url'=>array('admin')),
);
?>

<h1>Update TipoAccion <?php echo $model->id_tipo_accion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>