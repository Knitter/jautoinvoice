<?php $this->titulo = $modelo->isNewRecord ? 'Criar Modelo de Veículo' : 'Editar ' . $modelo->nome; ?>

<div id="titulo">
    <h2><?php echo $modelo->isNewRecord ? 'Criar' : 'Editar'; ?> Modelo</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('modelo/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-adicionar.png'), $this->createUrl('modelo/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('modelo' => $modelo, 'marcas' => $marcas));