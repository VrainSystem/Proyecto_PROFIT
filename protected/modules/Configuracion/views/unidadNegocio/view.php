<?php
/* @var $this UnidadNegocioController */
/* @var $model UnidadNegocio */

$this->breadcrumbs=array(
	'Unidad Negocios'=>array('index'),
	$model->id_unidad_negocio,
);

$this->menu=array(
	array('label'=>'List UnidadNegocio', 'url'=>array('index')),
	array('label'=>'Create UnidadNegocio', 'url'=>array('create')),
	array('label'=>'Update UnidadNegocio', 'url'=>array('update', 'id'=>$model->id_unidad_negocio)),
	array('label'=>'Delete UnidadNegocio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_unidad_negocio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UnidadNegocio', 'url'=>array('admin')),
);
?>

<h1>View UnidadNegocio #<?php echo $model->id_unidad_negocio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_unidad_negocio',
		'nombre',
		'descripcion',
		'id_empresa',
	),
)); ?>
