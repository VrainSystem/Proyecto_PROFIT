<?php
/* @var $this TipoRiesgoController */
/* @var $model TipoRiesgo */

$this->breadcrumbs=array(
	'Tipo Riesgos'=>array('index'),
	$model->id_tipo_riesgo=>array('view','id'=>$model->id_tipo_riesgo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoRiesgo', 'url'=>array('index')),
	array('label'=>'Create TipoRiesgo', 'url'=>array('create')),
	array('label'=>'View TipoRiesgo', 'url'=>array('view', 'id'=>$model->id_tipo_riesgo)),
	array('label'=>'Manage TipoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Update TipoRiesgo <?php echo $model->id_tipo_riesgo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>