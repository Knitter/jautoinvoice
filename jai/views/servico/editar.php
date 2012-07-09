<?php $this->titulo = $servico->isNewRecord ? 'Criar Serviço' : 'Editar ' . $servico->nome; ?>

<div id="titulo">
    <h2><?php echo $servico->isNewRecord ? 'Criar' : 'Editar'; ?> Serviço</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('servico/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/servico-adicionar.png'), $this->createUrl('servico/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>
<?php
$this->renderPartial('_form', array('servico' => $servico));
