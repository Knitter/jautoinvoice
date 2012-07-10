<?php $this->titulo = $folhaObra->isNewRecord ? 'Criar Folha de Obra' : 'Editar Folha ' . $folhaObra->data; ?>

<div id="titulo">
    <h2><?php echo $folhaObra->isNewRecord ? 'Criar' : 'Editar'; ?> Folha de Obra</h2>
    
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('folhaobra/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/folhaobra-adicionar.png'), $this->createUrl('folhaobra/adicionar'), array('class' => 'adicionar'));
        ?>
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