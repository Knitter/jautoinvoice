<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/blueprint/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/blueprint/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/blueprint/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/base.css" />

        <title></title>
    </head>
    <body>
        <div class="container" id="mainarea">
            <div class="container">
                <div id="content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?> jAutoInvoice | <a href="<?php echo $this->createURL('default/sobre'); ?>">Sobre</a>
        </div>
    </body>
</html>