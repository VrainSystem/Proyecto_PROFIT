<?php
/* @var $this ActividadControlController */
/* @var $data ActividadControl */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_actividad_control')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_actividad_control), array('view', 'id'=>$data->id_actividad_control)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>