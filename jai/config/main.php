<?php

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'default',
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
        //'db' => array(
        //'connectionString' => 'mysql:host=127.0.0.1;dbname=jai',
        //'emulatePrepare' => true,
        //'username' => 'root',
        //'password' => 'toor',
        //'charset' => 'utf8'
        //),
        'errorHandler' => array(
            'errorAction' => 'public/error'
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);