<?php
/* @var $this ProcesoController */
/* @var $data Proceso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proceso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_proceso), array('view', 'id'=>$data->id_proceso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_macroproceso')); ?>:</b>
	<?php echo CHtml::encode($data->id_macroproceso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_responsable')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_responsable); ?>
	<br />


</div>