<?php $this->title = $funcionario->isNewRecord ? 'Criar Funcionário' : 'Editar ' . $funcionario->nome; ?>

<div id="titulo">
    <h2><?php echo $funcionario->isNewRecord ? 'Criar' : 'Editar'; ?> Funcionário</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/funcionarios'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('funcionarios/criar'); ?>"><img src="imagens/icones/funcionario.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('funcionario' => $funcionario));