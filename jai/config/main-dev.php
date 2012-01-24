<?php

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'default',
    'sourceLanguage' => 'pt',
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'JAIWebUser',
            'loginUrl' => array('default/index'),
        ),
        //MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=jai',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'toor',
            'charset' => 'utf8'
        ),
        'errorHandler' => array(
            'errorAction' => 'default/error'
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning'
                )
            )
        )
    ),
    'params' => require(dirname(__FILE__) . '/params-dev.php'),
);