<?php
/* @var $this TipoPerdidaController */
/* @var $model TipoPerdida */

$this->breadcrumbs=array(
	'Tipo Perdidas'=>array('index'),
	$model->id_tipo_perdida=>array('view','id'=>$model->id_tipo_perdida),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoPerdida', 'url'=>array('index')),
	array('label'=>'Create TipoPerdida', 'url'=>array('create')),
	array('label'=>'View TipoPerdida', 'url'=>array('view', 'id'=>$model->id_tipo_perdida)),
	array('label'=>'Manage TipoPerdida', 'url'=>array('admin')),
);
?>

<h1>Update TipoPerdida <?php echo $model->id_tipo_perdida; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>