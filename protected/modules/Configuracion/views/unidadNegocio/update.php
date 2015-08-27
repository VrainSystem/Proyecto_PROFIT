<?php
/* @var $this UnidadNegocioController */
/* @var $model UnidadNegocio */

$this->breadcrumbs=array(
	'Unidad Negocios'=>array('index'),
	$model->id_unidad_negocio=>array('view','id'=>$model->id_unidad_negocio),
	'Update',
);

$this->menu=array(
	array('label'=>'List UnidadNegocio', 'url'=>array('index')),
	array('label'=>'Create UnidadNegocio', 'url'=>array('create')),
	array('label'=>'View UnidadNegocio', 'url'=>array('view', 'id'=>$model->id_unidad_negocio)),
	array('label'=>'Manage UnidadNegocio', 'url'=>array('admin')),
);
?>

<h1>Update UnidadNegocio <?php echo $model->id_unidad_negocio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>