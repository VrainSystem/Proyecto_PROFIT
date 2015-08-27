<?php
/* @var $this TipoCausaController */
/* @var $model TipoCausa */

$this->breadcrumbs=array(
	'Tipo Causas'=>array('index'),
	$model->id_tipo_causa=>array('view','id'=>$model->id_tipo_causa),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoCausa', 'url'=>array('index')),
	array('label'=>'Create TipoCausa', 'url'=>array('create')),
	array('label'=>'View TipoCausa', 'url'=>array('view', 'id'=>$model->id_tipo_causa)),
	array('label'=>'Manage TipoCausa', 'url'=>array('admin')),
);
?>

<h1>Update TipoCausa <?php echo $model->id_tipo_causa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>