<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="css/blueprint/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="css/blueprint/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="css/blueprint/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/base.css" />

        <title><?php echo $this->title; ?></title>
    </head>
    <body>
        <div class="container">
            <!-- THE MAIN MENU -->
            <?php if (!empty($this->menu)) { ?>
                <ul id="menu">
                    <?php foreach ($this->menu['links'] as $item) { ?>
                        <li><a href="<?php echo $item['url']; ?>"><img src="<?php echo $item['icon']; ?>" /><br /><?php echo $item['label']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
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