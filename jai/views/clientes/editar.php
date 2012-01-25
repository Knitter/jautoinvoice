<?php $this->title = $cliente->isNewRecord ? 'Criar Cliente' : 'Editar ' . $cliente->nome; ?>
<div id="titulo">
    <h2><?php echo $cliente->isNewRecord ? 'Criar' : 'Editar'; ?> Cliente</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('clientes/criar'); ?>"><img src="imagens/icones/x16.cliente.criar.png" /></a>
        <?php if (!$cliente->isNewRecord) { ?>
            <a href="<?php echo $this->createUrl('veiculos/lista', array('id' => $cliente->idCliente, 'op' => 'editar')); ?>"><img src="imagens/icones/x16.veiculo.png" /></a>
        <?php } ?>
    </div>
    <div style="clear: both"></div>
</div>

<?php
echo $this->renderPartial('_form', array('cliente' => $cliente));