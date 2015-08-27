<?php
/* @var $this TipoPerdidaController */
/* @var $data TipoPerdida */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_perdida')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_perdida), array('view', 'id'=>$data->id_tipo_perdida)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>