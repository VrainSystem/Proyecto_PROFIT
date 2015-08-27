<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_riesgo'); ?>
		<?php echo $form->textField($model,'id_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_riesgo'); ?>
		<?php echo $form->textField($model,'id_tipo_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_perdida'); ?>
		<?php echo $form->textField($model,'id_tipo_perdida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_causa'); ?>
		<?php echo $form->textField($model,'descripcion_causa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_actividad_control'); ?>
		<?php echo $form->textField($model,'id_actividad_control'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_actividad_control'); ?>
		<?php echo $form->textField($model,'descripcion_actividad_control',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_pesimista'); ?>
		<?php echo $form->textField($model,'impacto_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_probable'); ?>
		<?php echo $form->textField($model,'impacto_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_obtimista'); ?>
		<?php echo $form->textField($model,'impacto_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_pesimista'); ?>
		<?php echo $form->textField($model,'probabilidad_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_probable'); ?>
		<?php echo $form->textField($model,'probabilidad_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_obtimista'); ?>
		<?php echo $form->textField($model,'probabilidad_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_impacto_pesimista'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_pesimista',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_impacto_probable'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_probable',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_impacto_obtimista'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_obtimista',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_probabilidad_pesimista'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_pesimista',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_probabilidad_probable'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_probable',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_probabilidad_obtimista'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_obtimista',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_accion'); ?>
		<?php echo $form->textField($model,'id_tipo_accion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accion'); ?>
		<?php echo $form->textField($model,'accion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_deterministico'); ?>
		<?php echo $form->textField($model,'impacto_deterministico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_deterministica'); ?>
		<?php echo $form->textField($model,'probabilidad_deterministica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riesgo_deterministico'); ?>
		<?php echo $form->textField($model,'riesgo_deterministico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_estocastico'); ?>
		<?php echo $form->textField($model,'impacto_estocastico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_estocastica'); ?>
		<?php echo $form->textField($model,'probabilidad_estocastica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riesgo_estocastico'); ?>
		<?php echo $form->textField($model,'riesgo_estocastico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'indicador_riesgo'); ?>
		<?php echo $form->textField($model,'indicador_riesgo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_grupo_riesgo'); ?>
		<?php echo $form->textField($model,'id_grupo_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impacto_cualitativo'); ?>
		<?php echo $form->textField($model,'impacto_cualitativo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'probabilidad_cualitativa'); ?>
		<?php echo $form->textField($model,'probabilidad_cualitativa',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'riesgo_cualitativo'); ?>
		<?php echo $form->textField($model,'riesgo_cualitativo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->