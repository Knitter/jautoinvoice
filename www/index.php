<?php

$yii = dirname(__FILE__) . '/../framework/yii.php';
$config = dirname(__FILE__) . '/../jai/config/main.php';

if (is_file('debug.php')) {
    include 'debug.php';
}

require_once($yii);
Yii::createWebApplication($config)->run();
