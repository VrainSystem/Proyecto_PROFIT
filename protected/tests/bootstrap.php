<?php

// change the following paths if necessary
$yiit='E:\Install\!!!Yii\Framework's\yii-1_16\framework\yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
