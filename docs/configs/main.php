<?php

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'default',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'JAIWebUser',
            'loginUrl' => array('default/index'),
        ),
        'assetManager' => array(
            'basePath' => 'assets/yiicache',
            'baseUrl' => 'assets/yiicache'
        ),
        //MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=jautoinvoice',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'toor',
            'charset' => 'utf8'
        ),
        'errorHandler' => array(
            'errorAction' => 'default/error'
        )
    ),
    'params' => array(
        'hash' => ''
    )
);