<?php
/* @var $this PreguntaEspecificaController */
/* @var $data PreguntaEspecifica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta_especifica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pregunta_especifica), array('view', 'id'=>$data->id_pregunta_especifica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->pregunta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complimiento')); ?>:</b>
	<?php echo CHtml::encode($data->complimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta_madre')); ?>:</b>
	<?php echo CHtml::encode($data->id_pregunta_madre); ?>
	<br />


</div>