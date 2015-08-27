<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>
<div class="row-fluid">
        <div id="sidebar">
            <?php
            $this->beginWidget('bootstrap.widgets.TbMenu', array(
                'items' => $this->menu,
                'type' => 'pills',
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
<div class="row-fluid">
        <div class="main">
            <?php echo $content; ?>
        </div><!-- content -->
</div>
<?php $this->endContent(); ?>