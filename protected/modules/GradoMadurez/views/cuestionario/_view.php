<?php
/* @var $this CuestionarioController */
/* @var $data Cuestionario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cuestionario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cuestionario), array('view', 'id'=>$data->id_cuestionario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_madurez')); ?>:</b>
	<?php echo CHtml::encode($data->grado_madurez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad_negocio')); ?>:</b>
	<?php echo CHtml::encode($data->id_unidad_negocio); ?>
	<br />


</div>