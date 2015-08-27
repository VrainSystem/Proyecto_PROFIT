<?php
/* @var $this UnidadNegocioController */
/* @var $data UnidadNegocio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unidad_negocio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_unidad_negocio), array('view', 'id'=>$data->id_unidad_negocio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa); ?>
	<br />


</div>