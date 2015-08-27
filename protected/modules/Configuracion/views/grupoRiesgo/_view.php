<?php
/* @var $this GrupoRiesgoController */
/* @var $data GrupoRiesgo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo_riesgo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grupo_riesgo), array('view', 'id'=>$data->id_grupo_riesgo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>