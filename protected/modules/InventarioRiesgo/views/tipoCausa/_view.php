<?php
/* @var $this TipoCausaController */
/* @var $data TipoCausa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_causa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_causa), array('view', 'id'=>$data->id_tipo_causa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>