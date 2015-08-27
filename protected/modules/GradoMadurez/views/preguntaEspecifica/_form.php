<?php
/* @var $this PreguntaEspecificaController */
/* @var $model PreguntaEspecifica */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pregunta-especifica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pregunta'); ?>
		<?php echo $form->textField($model,'pregunta',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complimiento'); ?>
		<?php echo $form->textField($model,'complimiento'); ?>
		<?php echo $form->error($model,'complimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pregunta_madre'); ?>
		<?php echo $form->textField($model,'id_pregunta_madre'); ?>
		<?php echo $form->error($model,'id_pregunta_madre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->