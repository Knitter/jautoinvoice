<?php $this->titulo = $veiculo->isNewRecord ? 'Criar Veículo' : 'Editar ' . $veiculo->matricula; ?>

<div id="titulo">
    <h2><?php echo $veiculo->isNewRecord ? 'Criar' : 'Editar'; ?> Veículo</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('veiculo/lista', array('id' => $cliente->idCliente, 'op' => $op)), array('class' => '')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo-adicionar.png'), $this->createUrl('veiculo/adicionar', array('id' => $cliente->idCliente, 'op' => $op)), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>


<?php
$this->renderPartial('_form', array(
    'veiculo' => $veiculo,
    'combustiveis' => $combustiveis,
    'categorias' => $categorias,
    'modelos' => $modelos,
    'op' => $op,
    'cliente' => $cliente
));
