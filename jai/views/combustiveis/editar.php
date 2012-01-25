<?php $this->title = $combustivel->isNewRecord ? 'Criar Combustível' : 'Editar ' . $combustivel->nome; ?>

<div id="titulo">
    <h2><?php echo $combustivel->isNewRecord ? 'Criar' : 'Editar'; ?> Combustível</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/combustiveis'); ?>"><img src="imagens/icones/x16.voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('combustiveis/criar'); ?>"><img src="imagens/icones/x16.combustivel.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>
<?php
$this->renderPartial('_form', array('combustivel' => $combustivel));