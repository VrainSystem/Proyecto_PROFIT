<?php
/* @var $this GrupoPreguntasController */
/* @var $data GrupoPreguntas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo_preguntas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_grupo_preguntas), array('view', 'id'=>$data->id_grupo_preguntas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cuestionario')); ?>:</b>
	<?php echo CHtml::encode($data->id_cuestionario); ?>
	<br />


</div>