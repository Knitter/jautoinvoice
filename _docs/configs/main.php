<?php

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'default',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // use Gii
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'demo',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
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
    )
);