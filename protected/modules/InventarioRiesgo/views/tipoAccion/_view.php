<?php
/* @var $this TipoAccionController */
/* @var $data TipoAccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_accion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_accion), array('view', 'id'=>$data->id_tipo_accion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>