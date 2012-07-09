<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="css/all.styles<?php echo (YII_DEBUG ? '' : '.min'); ?>.css" media="screen, projection" />       
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="css/blueprint.ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="css/jquery.ui.1.8.17.min.css" media="screen, projection" />

        <script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui.1.8.17.min.js"></script>
        <script type="text/javascript" src="js/jai.all<?php echo (YII_DEBUG ? '' : '.min'); ?>.js"></script>

        <title><?php echo $this->titulo; ?></title>
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
            &copy; <?php echo date('Y'); ?> <a href="http://sourceforge.net/projects/jautoinvoice">jAutoInvoice</a> | <a href="<?php echo $this->createUrl('default/sobre'); ?>">Sobre</a>
        </div>
    </body>
</html>