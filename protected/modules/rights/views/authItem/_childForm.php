<div class="no-padding col-md-3" >

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class'=>'form-control')); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	</div>


<?php $this->endWidget(); ?>

</div>
<div class="no-padding col-md-1" >
    	
	<div class="buttons">
		<?php echo CHtml::submitButton(Rights::t('core', 'Add'), array('class'=>'btn btn-blue')); ?>
	</div>
</div>