<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main-dev.php'), array(
            'components' => array(
                'fixture' => array(
                    'class' => 'system.test.CDbFixtureManager',
                ),
                'db' => array(
                    'connectionString' => 'mysql:host=127.0.0.1;dbname=jaitesting',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => 'toor',
                    'charset' => 'utf8'
                ),
            )
                )
);
