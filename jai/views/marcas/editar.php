<?php $this->title = $marca->isNewRecord ? 'Criar Marca de Veículo' : 'Editar ' . $marca->nome; ?>

<div id="titulo">
    <h2><?php echo $marca->isNewRecord ? 'Criar' : 'Editar'; ?> Marca</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('marcas/criar'); ?>"><img src="imagens/icones/x16.marca.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('marca' => $marca));