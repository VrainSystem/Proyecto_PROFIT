<?php
/* @var $this DimensionController */
/* @var $data Dimension */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dimension')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dimension), array('view', 'id'=>$data->id_dimension)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->id_empresa); ?>
	<br />


</div>