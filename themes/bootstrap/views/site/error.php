<?php
$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>
<div class="main">
    <center><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/img/error.png'); ?></center>
    <center><div class="error">
            <h2>Error <?php echo $code; ?></h2>
            <p class="strapline" style="font-size: 140%"><?php echo CHtml::encode($message); ?></p>
        </div></center>
</div>