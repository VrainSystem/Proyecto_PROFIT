<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Assignments'),
);
?>

<div id="assignments">

<!--	<h3><?php echo Rights::t('core', 'Assignments'); ?></h3>-->
    <h3><i class="fa fa-check"></i> Administración: Asignaciones</h3>
    <div class="btn-group">
        <a class="btn btn-default" href="index.php?r=rights/assignment/view"><i class="fa fa-check-square-o"></i> Asignaciones</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/roles" ><i class="fa fa-wrench"></i> Perfiles</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/tasks" ><i class="fa fa-tasks"></i> Tareas</a>
        <a class="btn btn-dark-blue" href="index.php?r=rights/authItem/operations"><i class="fa fa-cogs"></i> Operaciones</a>
    </div>
    <hr>
    <div class="panel panel-white">
        <div class="panel-heading border-light">
            <h4 class="panel-title">Listado de Asignaciones de Usuario</h4>
        </div>
        <div class="panel-body">
            <p>
        <?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?>
    </p>

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,
        'itemsCssClass' => 'table table-bordered table-striped dataTable no-footer',
        'pager' => array(
            'class' => 'bootstrap.widgets.TbPager',
            'nextPageLabel' => '&gt;&gt;',
            'prevPageLabel' => '&lt;&lt;'
        ),
        'template' => "{items}\n{pager}",
        'emptyText' => Rights::t('core', 'No users found.'),
        'htmlOptions' => array('class' => 'grid-view assignment-table'),
        'columns' => array(
            array(
                'name' => 'name',
                'header' => Rights::t('core', 'Name'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'name-column'),
                'value' => '$data->getAssignmentNameLink()',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Perfiles'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'role-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Tasks'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'task-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
            ),
            array(
                'name' => 'assignments',
                'header' => Rights::t('core', 'Operations'),
                'type' => 'raw',
                'htmlOptions' => array('class' => 'operation-column'),
                'value' => '$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
            ),
        )
    ));
    ?>
        </div>
    </div>


</div>