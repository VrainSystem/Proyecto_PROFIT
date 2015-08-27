<?php
/* @var $this PreguntaEspecificaController */
/* @var $model PreguntaEspecifica */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta_especifica'); ?>
		<?php echo $form->textField($model,'id_pregunta_especifica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pregunta'); ?>
		<?php echo $form->textField($model,'pregunta',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'complimiento'); ?>
		<?php echo $form->textField($model,'complimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta_madre'); ?>
		<?php echo $form->textField($model,'id_pregunta_madre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->