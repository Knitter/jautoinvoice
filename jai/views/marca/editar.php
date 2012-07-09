<?php $this->titulo = $marca->isNewRecord ? 'Criar Marca de Veículo' : 'Editar ' . $marca->nome; ?>

<div id="titulo">
    <h2><?php echo $marca->isNewRecord ? 'Criar' : 'Editar'; ?> Marca</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('marca/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/marca-adicionar.png'), $this->createUrl('marca/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('marca' => $marca));