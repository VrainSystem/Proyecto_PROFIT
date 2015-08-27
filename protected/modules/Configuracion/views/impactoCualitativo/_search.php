<?php
/* @var $this ImpactoCualitativoController */
/* @var $model ImpactoCualitativo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_impacto_cualitativo'); ?>
		<?php echo $form->textField($model,'id_impacto_cualitativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_inferior'); ?>
		<?php echo $form->textField($model,'rango_inferior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_superior'); ?>
		<?php echo $form->textField($model,'rango_superior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->