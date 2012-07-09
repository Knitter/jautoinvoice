<?php $this->titulo = $combustivel->isNewRecord ? 'Criar Combustível' : 'Editar ' . $combustivel->nome; ?>

<div id="titulo">
    <h2><?php echo $combustivel->isNewRecord ? 'Criar' : 'Editar'; ?> Combustível</h2>
    
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('combustivel/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-adicionar.png'), $this->createUrl('combustivel/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>
<?php
$this->renderPartial('_form', array('combustivel' => $combustivel));