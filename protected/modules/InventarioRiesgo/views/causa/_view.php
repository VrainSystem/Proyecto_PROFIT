<?php
/* @var $this CausaController */
/* @var $data Causa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_causa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_causa), array('view', 'id'=>$data->id_causa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_causa')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_causa); ?>
	<br />


</div>