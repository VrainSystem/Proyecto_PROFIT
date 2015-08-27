<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Roles'),
);
?>

<div id="roles">

<!--	<h2><?php echo Rights::t('core', 'Roles'); ?></h2>-->
    <h3><i class="fa fa-wrench"></i> Administración: Perfiles</h3>
    <div class="btn-group">
        <a class="btn btn-dark-blue" href="index.php?r=rights/assignment/view"><i class="fa fa-check-square-o"></i> Asignaciones</a>
        <a class="btn btn-default" href="index.php?r=rights/authItem/roles" ><i class="fa fa-wrench"></i> Perfiles</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/tasks" ><i class="fa fa-tasks"></i> Tareas</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/operations"><i class="fa fa-cogs"></i> Operaciones</a>
    </div>
    <hr>

    <div class="panel panel-white">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Listado de perfiles de usuario</h4>
        </div>
        <div class="panel-body">
           
    <p>
<?php echo Rights::t('core', 'A role is group of permissions to perform a variety of tasks and operations, for example the authenticated user.'); ?><br />
<?php echo Rights::t('core', 'Roles exist at the top of the authorization hierarchy and can therefore inherit from other roles, tasks and/or operations.'); ?>
    </p>     
    <p>
        <i class="fa fa-plus-circle text-info"></i>
        <?php
echo CHtml::link(Rights::t('core', 'Crear Nuevo Perfil'), array('authItem/create', 'type' => CAuthItem::TYPE_ROLE), array(
    'class' => 'add-role-link',
));
?></p>


           <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'itemsCssClass' => 'table table-bordered table-striped dataTable no-footer',
        'template' => '{items}',
        'emptyText' => Rights::t('core', 'No roles found.'),
        'htmlOptions' => array('class' => 'grid-view role-table'),
        'columns' => array(
            array(
                'name' => 'name',
                'header' => Rights::t('core', 'Name'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'name-column'),
                'value' => '$data->getGridNameLink()',
            ),
            array(
                'name' => 'description',
                'header' => Rights::t('core', 'Description'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'description-column'),
            ),
//    		array(
//    			'name'=>'bizRule',
//    			'header'=>Rights::t('core', 'Business rule'),
//    			'type'=>'raw',
//    			'htmlOptions'=>array('class'=>'bizrule-column'),
//    			'visible'=>Rights::module()->enableBizRule===true,
//    		),
            array(
                'name' => 'data',
                'header' => Rights::t('core', 'Data'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'data-column'),
                'visible' => Rights::module()->enableBizRuleData === true,
            ),
            array(
                'header' => 'Acciones',
                'type' => 'raw',
//    			'htmlOptions'=>array('class'=>'actions-column'),
                'htmlOptions' => array('class' => 'center'),
                'value' => '$data->getDeleteRoleLink()',
            ),
        )
    ));
    ?>

    <p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

        </div>

   
</div>