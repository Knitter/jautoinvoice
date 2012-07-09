<?php $this->title = $cliente->isNewRecord ? 'Criar Cliente' : 'Editar ' . $cliente->nome; ?>
<div id="titulo">
    <h2><?php echo $cliente->isNewRecord ? 'Criar' : 'Editar'; ?> Cliente</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/clientes'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('clientes/criar'); ?>"><img src="imagens/icones/cliente.adicionar.png" /></a>
        <?php if (!$cliente->isNewRecord) { ?>
            &nbsp;&nbsp;
            <a href="<?php echo $this->createUrl('veiculos/lista', array('id' => $cliente->idCliente, 'op' => 'editar')); ?>"><img src="imagens/icones/veiculo.png" /></a>
            &nbsp;&nbsp;
            <a href="<?php echo $this->createUrl('clientes/rstpwd', array('id' => $cliente->idCliente, 'op' => 'editar')); ?>"><img src="imagens/icones/chave.png" /></a>
        <?php } ?>
    </div>
    <div style="clear: both"></div>
</div>

<?php
echo $this->renderPartial('_form', array('cliente' => $cliente));