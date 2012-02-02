<?php $this->title = $marca->isNewRecord ? 'Criar Marca de Veículo' : 'Editar ' . $marca->nome; ?>

<div id="titulo">
    <h2><?php echo $marca->isNewRecord ? 'Criar' : 'Editar'; ?> Marca</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/marcas'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('marcas/criar'); ?>"><img src="imagens/icones/marca.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('marca' => $marca));