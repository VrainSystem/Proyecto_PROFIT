<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Operations'),
);
?>

<div id="operations">

<!--	<h2><?php echo Rights::t('core', 'Operations'); ?></h2>-->
    <h3><i class="fa fa-cogs"></i> Administración: Operaciones</h3>
    <div class="btn-group">
        <a class="btn btn-dark-blue" href="index.php?r=rights/assignment/view"><i class="fa fa-check-square-o"></i> Asignaciones</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/roles" ><i class="fa fa-wrench"></i> Perfiles</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/tasks" ><i class="fa fa-tasks"></i> Tareas</a>
        <a class="btn btn-default" href="index.php?r=rights/authItem/operations"><i class="fa fa-cogs"></i> Operaciones</a>
    </div>
    <hr>
    <div class="panel panel-white">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Listado de Operaciones</h4>
            </div>
        <div class="panel-body">
         	<p>
		<?php echo Rights::t('core', 'An operation is a permission to perform a single operation, for example accessing a certain controller action.'); ?><br />
		<?php echo Rights::t('core', 'Operations exist below tasks in the authorization hierarchy and can therefore only inherit from other operations.'); ?>
	</p>

	<p>   <i class="fa fa-plus-circle text-info"></i>
            <?php echo CHtml::link(Rights::t('core', 'Create a new operation'), array('authItem/create', 'type'=>CAuthItem::TYPE_OPERATION), array(
		'class'=>'add-operation-link',
	)); ?></p>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>'{items}',
            'itemsCssClass' => 'table table-bordered table-striped dataTable no-footer',
	    'emptyText'=>Rights::t('core', 'No operations found.'),
	    'htmlOptions'=>array('class'=>'grid-view operation-table sortable-table'),
	    'columns'=>array(
	    	array(
    			'name'=>'name',
    			'header'=>Rights::t('core', 'Name'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'name-column'),
    			'value'=>'$data->getGridNameLink()',
    		),
    		array(
    			'name'=>'description',
    			'header'=>Rights::t('core', 'Description'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'description-column'),
    		),
    		array(
    			'name'=>'bizRule',
    			'header'=>Rights::t('core', 'Business rule'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'bizrule-column'),
    			'visible'=>Rights::module()->enableBizRule===true,
    		),
    		array(
    			'name'=>'data',
    			'header'=>Rights::t('core', 'Data'),
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'data-column'),
    			'visible'=>Rights::module()->enableBizRuleData===true,
    		),
    		array(
    			'header'=>'Acciones',
    			'type'=>'raw',
    			'htmlOptions'=>array('class'=>'center'),
    			'value'=>'$data->getDeleteOperationLink()',
    		),
	    )
	)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

        </div>
    </div>

</div>