<?php
/* @var $this GrupoRiesgoController */
/* @var $model GrupoRiesgo */

$this->breadcrumbs=array(
	'Grupo Riesgos'=>array('index'),
	$model->id_grupo_riesgo=>array('view','id'=>$model->id_grupo_riesgo),
	'Update',
);

$this->menu=array(
	array('label'=>'List GrupoRiesgo', 'url'=>array('index')),
	array('label'=>'Create GrupoRiesgo', 'url'=>array('create')),
	array('label'=>'View GrupoRiesgo', 'url'=>array('view', 'id'=>$model->id_grupo_riesgo)),
	array('label'=>'Manage GrupoRiesgo', 'url'=>array('admin')),
);
?>

<h1>Update GrupoRiesgo <?php echo $model->id_grupo_riesgo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>