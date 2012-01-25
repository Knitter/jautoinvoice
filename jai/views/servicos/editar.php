<?php $this->title = $servico->isNewRecord ? 'Criar Serviço' : 'Editar ' . $servico->nome; ?>
<div id="titulo">
    <h2><?php echo $servico->isNewRecord ? 'Criar' : 'Editar'; ?> Serviço</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/servicos'); ?>"><img src="imagens/icones/x16.voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('servicos/criar'); ?>"><img src="imagens/icones/x16.servico.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>
<?php
$this->renderPartial('_form', array('servico' => $servico, 'ivas' => $ivas));
