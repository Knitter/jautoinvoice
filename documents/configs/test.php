<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            'components' => array(
                'fixture' => array(
                    'class' => 'system.test.CDbFixtureManager',
                ),
                'db' => array(
                    'connectionString' => 'mysql:host=<SERVER>;dbname=<DBNAME>',
                    'emulatePrepare' => true,
                    'username' => '<USER>',
                    'password' => '<PASSWORD>',
                    'charset' => 'utf8'
                ),
            )
                )
);
