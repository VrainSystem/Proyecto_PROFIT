<div class="no-padding col-md-3" >

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('maxlength'=>255, 'class'=>'form-control')); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	</div>
</div>	
<div class="no-padding col-md-1" >
	<div class="buttons">
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign'), array("class" => "btn btn-blue") ); ?>
	</div>

<?php $this->endWidget(); ?>

</div>