<div id="titulo">
    <h2>Veículos de <?php echo $cliente->nome; ?></h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('clientes/adicionarveiculo', array('id' => $cliente->idCliente)); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /> Adicionar</a>
        <!-- <a href="<?php echo $this->createUrl('clientes/passarveiculo', array('id' => $cliente->idCliente)); ?>"><img src="imagens/icones/x16.veiculo.criar.png" /> Adicionar</a> -->
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
            'value' => 'strtotime($data->dataRegisto)'
        ),
        array(
            'header' => 'Modelo',
            'type' => 'raw',
            'value' => '$data->modelo->marca->nome . " ". $data->modelo->nome',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Registo',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.veiculo.apagar.png',
                    'url' => 'Yii::app()->createUrl("clientes/removerveiculo", array("idc" => $data->idCliente, "idv" => $data->idVeiculo))'
                ),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.veiculo.png',
                    'url' => 'Yii::app()->createUrl("clientes/editarveiculo", array("idc" => $data->idCliente, "idv" => $data->idVeiculo))'
                )
            ),
        ),
    ),
));