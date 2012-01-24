<?php $this->title = $material->isNewRecord ? 'Criar Material' : 'Editar ' . $material->referencia; ?> 
<div id="titulo">
    <h2><?php echo $material->isNewRecord ? 'Criar' : 'Editar'; ?> Material</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('stock/criar'); ?>"><img src="imagens/icones/x16.material.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>
<?php
$this->renderPartial('_form', array('material' => $material, 'ivas' => $ivas));