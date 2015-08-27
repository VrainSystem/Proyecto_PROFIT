<?php
/* @var $this RiesgoCualitativoController */
/* @var $data RiesgoCualitativo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_riesgo_cualitativo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_riesgo_cualitativo), array('view', 'id'=>$data->id_riesgo_cualitativo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_inferior')); ?>:</b>
	<?php echo CHtml::encode($data->rango_inferior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_superior')); ?>:</b>
	<?php echo CHtml::encode($data->rango_superior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


</div>