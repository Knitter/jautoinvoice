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
        //'user' => array(
        // enable cookie-based authentication
        //    'allowAutoLogin' => true,
        //),
        'assetManager' => array(
            'basePath' => 'assets/yiicache',
            'baseUrl' => 'assets/yiicache'
        ),
        // uncomment the following to enable URLs in path-format
        //'urlManager' => array(
        //    'urlFormat' => 'path',
        //    'rules' => array(
        //        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        //        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        //        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        //    ),
        //),
        //MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=jautoinvoice',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'toor',
            'charset' => 'utf8',
        ),
        //'errorHandler' => array(
        // use 'site/error' action to display errors
        //    'errorAction' => 'site/error',
        //),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        //'params' => array(
        // this is used in contact page
        //    'adminEmail' => 'webmaster@example.com',
        //),
);