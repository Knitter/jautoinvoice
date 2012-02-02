<?php
$this->title = 'Lista de Veículos';

if ($op == 'editar') {
    $voltar = $this->createUrl('/clientes/editar', array('id' => $cliente->idCliente));
} else {
    $voltar = $this->createUrl('/clientes');
}
?>
<div id="titulo">
    <h2>Veículos de <?php echo $cliente->nome; ?></h2>
    <div id="opcoes">
        <a href="<?php echo $voltar; ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('veiculos/criar', array('id' => $cliente->idCliente, 'op' => $op)); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /></a>
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
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/veiculo.remover.png',
                    'url' => 'Yii::app()->createUrl("veiculos/apagar", array("id" => $data->idVeiculo))'
                ),
                'update' => array(
                    'imageUrl' => 'imagens/icones/veiculo.editar.png',
                    'url' => 'Yii::app()->createUrl("veiculos/editar", array("id" => $data->idVeiculo, "op" => "' . $op . '"))'
                )
            ),
        ),
    ),
));