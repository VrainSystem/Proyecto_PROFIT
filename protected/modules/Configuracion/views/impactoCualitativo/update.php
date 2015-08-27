<?php
/* @var $this ImpactoCualitativoController */
/* @var $model ImpactoCualitativo */

$this->breadcrumbs=array(
	'Impacto Cualitativos'=>array('index'),
	$model->id_impacto_cualitativo=>array('view','id'=>$model->id_impacto_cualitativo),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImpactoCualitativo', 'url'=>array('index')),
	array('label'=>'Create ImpactoCualitativo', 'url'=>array('create')),
	array('label'=>'View ImpactoCualitativo', 'url'=>array('view', 'id'=>$model->id_impacto_cualitativo)),
	array('label'=>'Manage ImpactoCualitativo', 'url'=>array('admin')),
);
?>

<h1>Update ImpactoCualitativo <?php echo $model->id_impacto_cualitativo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>