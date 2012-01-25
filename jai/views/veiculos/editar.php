<?php $this->title = $veiculo->isNewRecord ? 'Criar Veículo' : 'Editar ' . $veiculo->matricula; ?>

<div id="titulo">
    <h2><?php echo $veiculo->isNewRecord ? 'Criar' : 'Editar'; ?> Veículo</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('veiculos/lista', array('id' => $cliente->idCliente, 'op' => $op)); ?>"><img src="imagens/icones/x16.voltar.png" /></a>
        <a href="<?php echo $this->createUrl('veiculos/criar', array('id' => $cliente->idCliente, 'op' => $op)); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
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
