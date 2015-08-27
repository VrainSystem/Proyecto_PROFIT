<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Create :type', array(':type' => Rights::getAuthItemTypeName($_GET['type']))),
);
?>

<div class="createAuthItem">

    <!--	<h2><?php
echo Rights::t('core', 'Create :type', array(
    ':type' => Rights::getAuthItemTypeName($_GET['type']),
));
?></h2>-->
  

    <div class="panel panel-blue">
        <div class="panel-heading border-light">
            <h4 class="panel-title"><i class="fa fa-pencil-square"></i> <?php
    echo Rights::t('core', 'Create :type', array(
        ':type' => Rights::getAuthItemTypeName($_GET['type']),
    ));
    ?></h4>          
        </div>
        <div class="panel-body partition-white">
           <?php $this->renderPartial('_form', array('model' => $formModel)); ?>
        </div>
    </div>
</div>