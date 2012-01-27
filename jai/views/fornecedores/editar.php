<?php 
$this->title = $fornecedor->isNewRecord ? 'Criar Fornecedor' : 'Editar ' . $fornecedor->nome; 

Yii::app()->clientScript->registerScriptFile('js/jai/default.js');
?>

<div id="titulo">
    <h2><?php echo $fornecedor->isNewRecord ? 'Criar' : 'Editar'; ?> Fornecedor</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/fornecedores'); ?>"><img src="imagens/icones/x16.voltar.png" /></a>&nbsp;&nbsp;
        <a href="javascript:caixaEmail(<?php echo $fornecedor->idFornecedor; ?>);"><img src="imagens/icones/x16.email.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('fornecedores/criar'); ?>"><img src="imagens/icones/x16.fornecedor.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('fornecedor' => $fornecedor));

$this->renderPartial('//_common/_email', array('url' => $this->createUrl('fornecededores/email')));