<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <?php $baseUrl = Yii::app()->baseUrl; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/all.styles.css" />       
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/blueprint.ie.css" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/jquery.ui.1.8.17.min.css" media="screen, projection" />

        <script src="<?php echo $baseUrl; ?>/js/jquery.1.7.1.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jquery.ui.1.8.17.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/jai.all.js"></script>

        <title><?php echo CHtml::encode($this->titulo); ?></title>
    </head>
    <body>
        <div class="container">
            <!-- THE MAIN MENU -->
            <?php
            $this->widget('ext.JMenu', array(
                'items' => $this->menu,
                'id' => 'menu'
            ));
            ?>
        </div>
        <div class="container">
            <!-- CENTER AREA -->
            <div class="span-24" id="content">
                <!-- PAGE CONTENT -->
                <?php echo $content; ?>
            </div>
        </div>
        <div id="footer">
            <!-- FOOTER TEXT -->
            &copy; <?php echo date('Y'); ?> <a target="_blank" href="#">jAutoInvoice 1.0&beta;</a> | <a href="<?php echo $this->createUrl('publico/sobre'); ?>">Sobre</a>
        </div>
    </body>
</html>