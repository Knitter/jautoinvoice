<?php $this->titulo = $cliente->isNewRecord ? 'Criar Cliente' : 'Editar ' . $cliente->nome; ?>
<div id="titulo">
    <h2><?php echo $cliente->isNewRecord ? 'Criar' : 'Editar'; ?> Cliente</h2>
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('cliente/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/cliente-adicionar.png'), $this->createUrl('cliente/adicionar'), array('class' => 'adicionar'));

        if (!$cliente->isNewRecord) {
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo.png'), $this->createUrl('veiculo/lista')),
            CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/chave.png'), $this->createUrl('cliente/password'));
        }
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
echo $this->renderPartial('_form', array('cliente' => $cliente));