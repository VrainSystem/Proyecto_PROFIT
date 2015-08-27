<?php
/* @var $this ObjetivoEstrategicoController */
/* @var $data ObjetivoEstrategico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_objetivo_estrategico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_objetivo_estrategico), array('view', 'id'=>$data->id_objetivo_estrategico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dimension')); ?>:</b>
	<?php echo CHtml::encode($data->id_dimension); ?>
	<br />


</div>