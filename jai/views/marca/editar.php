<?php $this->titulo = $marca->isNewRecord ? 'Criar Marca de Veículo' : 'Editar ' . $marca->nome; ?>

<div id="titulo">
    <h2><?php echo $marca->isNewRecord ? 'Criar' : 'Editar'; ?> Marca</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/marcas'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/voltar.png" /></a>
        <a href="<?php echo $this->createUrl('marcas/criar'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/marca.adicionar.png" /></a>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('marca' => $marca));