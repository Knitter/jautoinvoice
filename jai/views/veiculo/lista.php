<?php
$this->titulo = 'Lista de Veículos';

if ($op == 'editar') {
    $voltar = $this->createUrl('/clientes/editar', array('id' => $cliente->idCliente));
} else {
    $voltar = $this->createUrl('/clientes');
}
?>
<div id="titulo">
    <h2>Veículos de <?php echo $cliente->nome; ?></h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $voltar, array('class' => '')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo-adicionar.png'), $this->createUrl('veiculo/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'veiculo-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        'matricula',
        array(
            'name' => 'dataRegisto',
            'type' => 'date',
            'value' => 'strtotime($data->dataRegisto)',
            'headerHtmlOptions' => array('class' => 'small-column')
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
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo-remover.png',
                    'url' => 'Yii::app()->createUrl("veiculos/apagar", array("id" => $data->idVeiculo))'
                ),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo-editar.png',
                    'url' => 'Yii::app()->createUrl("veiculos/editar", array("id" => $data->idVeiculo, "op" => "' . $op . '"))'
                )
            ),
        ),
    ),
));