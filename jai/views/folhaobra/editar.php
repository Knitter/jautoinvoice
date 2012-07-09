<?php $this->titulo = $folhaObra->isNewRecord ? 'Criar Folha de Obra' : 'Editar Folha ' . $folhaObra->data; ?>
<div id="titulo">
    <h2><?php echo $folhaObra->isNewRecord ? 'Criar' : 'Editar'; ?> Folha de Obra</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/obras'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/voltar.png" /></a>
        <a href="<?php echo $this->createUrl('obras/criar'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/folhaobra.adicionar.png" /></a>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array(
    'folhaObra' => $folhaObra,
    'funcionarios' => $funcionarios,
    'servicos' => $servicos,
    'materiais' => $materiais
));