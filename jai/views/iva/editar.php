<?php $this->titulo = $iva->isNewRecord ? 'Criar Taxa de IVA' : 'Editar Taxa de ' . $iva->percentagem . '%'; ?>

<div id="titulo">
    <h2><?php echo $iva->isNewRecord ? 'Criar' : 'Editar'; ?> Taxa de IVA</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('iva/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/iva-adicionar.png'), $this->createUrl('iva/adicionar', array('class' => 'adicionar')));
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('iva' => $iva));