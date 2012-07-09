<?php $this->title = $material->isNewRecord ? 'Criar Material' : 'Editar ' . $material->referencia; ?> 
<div id="titulo">
    <h2><?php echo $material->isNewRecord ? 'Criar' : 'Editar'; ?> Material</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/stock'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/voltar.png" /></a>
        <a href="<?php echo $this->createUrl('stock/criar'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/material.adicionar.png" /></a>
    </div>
    <div class="clear"></div>
</div>
<?php
$this->renderPartial('_form', array('material' => $material, 'ivas' => $ivas, 'fornecedores' => $fornecedores));