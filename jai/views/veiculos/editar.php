<?php
$this->title = $veiculo->isNewRecord ? 'Criar Veículo' : 'Editar ' . $veiculo->matricula;

$params = array('id' => $cliente->idCliente);
if (isset($lista)) {
    $url = $this->createUrl('/clientes');
    $params['l'] = 1;
} else {
    $url = $this->createUrl('clientes/editar', array('id' => $cliente->idCliente));
}
?>

<div id="titulo">
    <h2><?php echo $veiculo->isNewRecord ? 'Criar' : 'Ediar'; ?> Veículo</h2>
    <div id="opcoes">
        <a href="<?php echo $url; ?>"><img src="imagens/icones/x16.voltar.png" /></a>
        <a href="<?php echo $this->createUrl('veiculos/criar', $params); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>


<?php
$this->renderPartial('_form', array(
    'veiculo' => $veiculo,
    'combustiveis' => $combustiveis,
    'categorias' => $categorias,
    'modelos' => $modelos,
    'url' => $url
));
