<?php
/* @var $this TipoRiesgoController */
/* @var $data TipoRiesgo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_riesgo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_riesgo), array('view', 'id'=>$data->id_tipo_riesgo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>