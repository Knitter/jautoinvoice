<?php

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'default',
    //'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => false,
                'jquery.min.js' => false,
                'jquery-ui.css' => false
            )
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'JAIWebUser',
            'loginUrl' => array('default/login'),
        ),
        //MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=<SERVER>;dbname=<DBNAME>',
            'emulatePrepare' => true,
            'username' => '<USER>',
            'password' => '<PASSWORD>',
            'charset' => 'utf8'
        ),
        'errorHandler' => array(
            'errorAction' => 'public/erro'
        ),
        /*'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning'
                )
            )
        )*/
    ),
    'params' => require(dirname(__FILE__) . '/params-dev.php'),
);