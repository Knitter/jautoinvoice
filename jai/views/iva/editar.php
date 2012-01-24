<?php $this->title = $iva->isNewRecord ? 'Criar Taxa de IVA' : 'Editar Taxa de ' . $iva->percentagem . '%'; ?>

<div id="titulo">
    <h2><?php echo $iva->isNewRecord ? 'Criar' : 'Editar'; ?> Taxa de IVA</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('iva/criar'); ?>"><img src="imagens/icones/x16.iva.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('iva' => $iva));