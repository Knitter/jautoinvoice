<?php $this->title = $folhaObra->isNewRecord ? 'Criar Folha de Obra' : 'Editar Folha ' . $folhaObra->data; ?>
<div id="titulo">
    <h2><?php echo $folhaObra->isNewRecord ? 'Criar' : 'Editar'; ?> Folha de Obra</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/obras'); ?>"><img src="imagens/icones/x16.voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('obras/criar'); ?>"><img src="imagens/icones/x16.folhaobra.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->renderPartial('_form', array('folhaObra' => $folhaObra));