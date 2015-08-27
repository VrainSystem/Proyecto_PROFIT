<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments')=>array('assignment/view'),
	$model->getName(),
); ?>

<div id="userAssignments">
 <div class="panel panel-blue">
        <div class="panel-heading border-light">
            <h4 class="panel-title"><i class="fa fa-pencil-square"></i> <?php echo Rights::t('core', 'Assignments for :username', array(
		':username'=>$model->getName()
	)); ?></h4>          
        </div>
        <div class="panel-body partition-white">
           <div class="add-assignment col-md-12">

		<h6><?php echo Rights::t('core', 'Assign item'); ?></h6>

		<?php if( $formModel!==null ): ?>

			<div class="form">

				<?php $this->renderPartial('_form', array(
					'model'=>$formModel,
					'itemnameSelectOptions'=>$assignSelectOptions,
                                       
				)); ?>

			</div>

		<?php else: ?>

			<p class="info"><?php echo Rights::t('core', 'No assignments available to be assigned to this user.'); ?>

		<?php endif; ?>

	</div>
	

    <div id="permisos" class="col-md-12 ">

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'dataProvider'=>$dataProvider,
			'template'=>'{items}',
                    'itemsCssClass' => 'table table-bordered table-striped dataTable no-footer',
			'hideHeader'=>true,
			'emptyText'=>Rights::t('core', 'This user has not been assigned any items.'),
			'htmlOptions'=>array('class'=>'grid-view user-assignment-table mini'),
			'columns'=>array(
    			array(
    				'name'=>'name',
    				'header'=>Rights::t('core', 'Name'),
    				'type'=>'raw',
                            
    				'htmlOptions'=>array('class'=>'name-column'),
    				'value'=>'$data->getNameText()',
    			),
    			array(
    				'name'=>'type',
    				'header'=>Rights::t('core', 'Type'),
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'type-column'),
    				'value'=>'$data->getTypeText()',
    			),
    			array(
    				'header'=>'&nbsp;',
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'actions-column'),
    				'value'=>'$data->getRevokeAssignmentLink()',
    			),
			)
		));
//                foreach ($dataProvider as $key => $value) {
//                    echo $key;
//                    echo "   ";
//                    echo $value->getTypeText();
//                    echo '<br>';
//}
//                ?>

	</div>
            
        </div>
    </div>


	  <?php echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl,  array("class" => "btn btn-cancel")); 
                 ?>
 
</div>
 