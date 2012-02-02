<?php $this->title = $modelo->isNewRecord ? 'Criar Modelo de Veículo' : 'Editar ' . $modelo->nome; ?>

<div id="titulo">
    <h2><?php echo $modelo->isNewRecord ? 'Criar' : 'Editar'; ?> Modelo</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/editar'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('modelos/criar'); ?>"><img src="imagens/icones/modelo.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('modelo' => $modelo, 'marcas' => $marcas));