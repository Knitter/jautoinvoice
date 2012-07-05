<?php $this->title = $servico->isNewRecord ? 'Criar Serviço' : 'Editar ' . $servico->nome; ?>
<div id="titulo">
    <h2><?php echo $servico->isNewRecord ? 'Criar' : 'Editar'; ?> Serviço</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/servicos'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/voltar.png" /></a>
        <a href="<?php echo $this->createUrl('servicos/criar'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/servico.adicionar.png" /></a>
    </div>
    <div class="clear"></div>
</div>
<?php
$this->renderPartial('_form', array('servico' => $servico));
