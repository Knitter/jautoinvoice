<?php

// change the following paths if necessary
$yii = dirname(__FILE__) . '/../yii/yii.php';
$config = dirname(__FILE__) . '/../jai/config/test.php';
defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once($yii);
Yii::createWebApplication($config)->run();
