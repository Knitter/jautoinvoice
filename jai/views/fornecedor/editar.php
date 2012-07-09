<?php
$this->titulo = $fornecedor->isNewRecord ? 'Criar Fornecedor' : 'Editar ' . $fornecedor->nome;
?>

<div id="titulo">
    <h2><?php echo $fornecedor->isNewRecord ? 'Criar' : 'Editar'; ?> Fornecedor</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/fornecedores'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('fornecedores/criar'); ?>"><img src="imagens/icones/fornecedor.adicionar.png" /></a>
        <?php if (!$fornecedor->isNewRecord) { ?>
            &nbsp;&nbsp;
            <a href="javascript:caixaEmail(<?php echo $fornecedor->idFornecedor; ?>);"><img src="imagens/icones/email.png" /></a>
        <?php } ?>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('fornecedor' => $fornecedor));

$this->renderPartial('//_common/_email', array('url' => $this->createUrl('fornecededores/email')));