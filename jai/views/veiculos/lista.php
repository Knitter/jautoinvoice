<?php
$this->title = 'Lista de Veículos';

$params = array('id' => $cliente->idCliente);
if (isset($lista)) {
    $url = $this->createUrl('/clientes');
    $params['l'] = 1;
} else {
    $url = $this->createUrl('clientes/editar', array('id' => $cliente->idCliente));
}
?>

<div id="titulo">
    <h2>Veículos de <?php echo $cliente->nome; ?></h2>
    <div id="opcoes">
        <a href="<?php echo $url; ?>"><img src="imagens/icones/x16.voltar.png" /></a>
        <a href="<?php echo $this->createUrl('veiculos/criar', $params); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'veiculo-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        'matricula',
        array(
            'name' => 'dataRegisto',
            'type' => 'date',
            'value' => 'strtotime($data->dataRegisto)',
            'htmlOptions' => array('class' => 'small-column')
        ),
        array(
            'header' => 'Modelo',
            'type' => 'raw',
            'value' => '$data->modelo->marca->nome . " ". $data->modelo->nome',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.veiculo.apagar.png',
                    'url' => 'Yii::app()->createUrl("veiculos/apagar", array("id" => $data->idVeiculo))'
                ),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.veiculo.editar.png',
                    'url' => 'Yii::app()->createUrl("veiculos/editar", array("id" => $data->idVeiculo' . isset($lista) ? ', "l" => 1' : '' . '))'
                )
            ),
        ),
    ),
));