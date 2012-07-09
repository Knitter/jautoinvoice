<?php $this->titulo = $iva->isNewRecord ? 'Criar Taxa de IVA' : 'Editar Taxa de ' . $iva->percentagem . '%'; ?>

<div id="titulo">
    <h2><?php echo $iva->isNewRecord ? 'Criar' : 'Editar'; ?> Taxa de IVA</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/iva'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('iva/criar'); ?>"><img src="imagens/icones/iva.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('iva' => $iva));