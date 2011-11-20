<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="assets/css/blueprint/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="assets/css/blueprint/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="assets/css/blueprint/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="assets/css/base.css" />

        <title><?php echo $this->title; ?></title>
    </head>
    <body>
        <div class="container">
            <ul id="menu">
                <!-- <li><a href="<?php echo $this->createUrl('/folhasobra'); ?>"><img src="assets/images/icon-x32-folhaobra.png" /><br />Folhas Obra</a></li> -->
                <!-- <li><a href="<?php echo $this->createUrl('/marcacoes'); ?>"><img src="assets/images/icon-x32-marcacoes.png" /><br />Marcações</a></li> -->
                <!-- <li><a href="<?php echo $this->createUrl('/veiculos'); ?>"><img src="assets/images/icon-x32-veiculo.png" /><br />Veiculos</a></li> -->
                <!-- <li><a href="<?php echo $this->createUrl('/fornecedores'); ?>"><img src="assets/images/icon-x32-fornecedor.png" /><br />Fornecedores</a></li> -->
                <!-- <li><a href="<?php echo $this->createUrl('/facturas'); ?>"><img src="assets/images/icon-x32-factura.png" /><br />Facturas</a></li> -->
                <li><a href="<?php echo $this->createUrl('/clientes'); ?>"><img src="assets/images/icons/x32-cliente.png" /><br />Clientes</a></li>
                <li><a href="<?php echo $this->createUrl('/funcionarios'); ?>"><img src="assets/images/icons/x32-funcionario.png" /><br />Funcionários</a></li>
                <li><a href="<?php echo $this->createUrl('/fornecedores'); ?>"><img src="assets/images/icons/x32-fornecedor.png" /><br />Fornecedores</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="span-24" id="content">
                <?php echo $content; ?>
            </div>
        </div>
        <div id="footer">
            &copy; <?php echo date('Y'); ?> <a href="http://sourceforge.net/projects/jautoinvoice">jAutoInvoice</a> | <a href="<?php echo $this->createUrl('default/sobre'); ?>">Sobre</a>
        </div>
    </body>
</html>