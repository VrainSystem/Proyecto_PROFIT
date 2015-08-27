<?php
/* @var $this PreguntaMadreController */
/* @var $data PreguntaMadre */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta_madre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pregunta_madre), array('view', 'id'=>$data->id_pregunta_madre)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo_preguntas')); ?>:</b>
	<?php echo CHtml::encode($data->id_grupo_preguntas); ?>
	<br />


</div>