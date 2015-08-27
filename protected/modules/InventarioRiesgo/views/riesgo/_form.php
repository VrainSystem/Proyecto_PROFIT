<?php
/* @var $this RiesgoController */
/* @var $model Riesgo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'riesgo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_riesgo'); ?>
		<?php echo $form->textField($model,'id_tipo_riesgo'); ?>
		<?php echo $form->error($model,'id_tipo_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_perdida'); ?>
		<?php echo $form->textField($model,'id_tipo_perdida'); ?>
		<?php echo $form->error($model,'id_tipo_perdida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_causa'); ?>
		<?php echo $form->textField($model,'descripcion_causa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_causa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_actividad_control'); ?>
		<?php echo $form->textField($model,'id_actividad_control'); ?>
		<?php echo $form->error($model,'id_actividad_control'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_actividad_control'); ?>
		<?php echo $form->textField($model,'descripcion_actividad_control',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_actividad_control'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_pesimista'); ?>
		<?php echo $form->textField($model,'impacto_pesimista'); ?>
		<?php echo $form->error($model,'impacto_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_probable'); ?>
		<?php echo $form->textField($model,'impacto_probable'); ?>
		<?php echo $form->error($model,'impacto_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_obtimista'); ?>
		<?php echo $form->textField($model,'impacto_obtimista'); ?>
		<?php echo $form->error($model,'impacto_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_pesimista'); ?>
		<?php echo $form->textField($model,'probabilidad_pesimista'); ?>
		<?php echo $form->error($model,'probabilidad_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_probable'); ?>
		<?php echo $form->textField($model,'probabilidad_probable'); ?>
		<?php echo $form->error($model,'probabilidad_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_obtimista'); ?>
		<?php echo $form->textField($model,'probabilidad_obtimista'); ?>
		<?php echo $form->error($model,'probabilidad_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_impacto_pesimista'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_pesimista',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_impacto_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_impacto_probable'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_probable',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_impacto_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_impacto_obtimista'); ?>
		<?php echo $form->textField($model,'descripcion_impacto_obtimista',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_impacto_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_probabilidad_pesimista'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_pesimista',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_probabilidad_pesimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_probabilidad_probable'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_probable',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_probabilidad_probable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_probabilidad_obtimista'); ?>
		<?php echo $form->textField($model,'descripcion_probabilidad_obtimista',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'descripcion_probabilidad_obtimista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_accion'); ?>
		<?php echo $form->textField($model,'id_tipo_accion'); ?>
		<?php echo $form->error($model,'id_tipo_accion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accion'); ?>
		<?php echo $form->textField($model,'accion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'accion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_deterministico'); ?>
		<?php echo $form->textField($model,'impacto_deterministico'); ?>
		<?php echo $form->error($model,'impacto_deterministico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_deterministica'); ?>
		<?php echo $form->textField($model,'probabilidad_deterministica'); ?>
		<?php echo $form->error($model,'probabilidad_deterministica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riesgo_deterministico'); ?>
		<?php echo $form->textField($model,'riesgo_deterministico'); ?>
		<?php echo $form->error($model,'riesgo_deterministico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_estocastico'); ?>
		<?php echo $form->textField($model,'impacto_estocastico'); ?>
		<?php echo $form->error($model,'impacto_estocastico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_estocastica'); ?>
		<?php echo $form->textField($model,'probabilidad_estocastica'); ?>
		<?php echo $form->error($model,'probabilidad_estocastica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riesgo_estocastico'); ?>
		<?php echo $form->textField($model,'riesgo_estocastico'); ?>
		<?php echo $form->error($model,'riesgo_estocastico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'indicador_riesgo'); ?>
		<?php echo $form->textField($model,'indicador_riesgo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'indicador_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_grupo_riesgo'); ?>
		<?php echo $form->textField($model,'id_grupo_riesgo'); ?>
		<?php echo $form->error($model,'id_grupo_riesgo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impacto_cualitativo'); ?>
		<?php echo $form->textField($model,'impacto_cualitativo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'impacto_cualitativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'probabilidad_cualitativa'); ?>
		<?php echo $form->textField($model,'probabilidad_cualitativa',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'probabilidad_cualitativa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'riesgo_cualitativo'); ?>
		<?php echo $form->textField($model,'riesgo_cualitativo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'riesgo_cualitativo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->