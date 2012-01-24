<?php $this->title = $fornecedor->isNewRecord ? 'Criar Fornecedor' : 'Editar ' . $fornecedor->nome; ?>

<div id="titulo">
    <h2><?php echo $fornecedor->isNewRecord ? 'Criar' : 'Editar'; ?> Fornecedor</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('fornecedores/criar'); ?>"><img src="imagens/icones/x16.fornecedor.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
echo $this->renderPartial('_form', array('fornecedor' => $fornecedor));