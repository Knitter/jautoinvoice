<?php
$this->menu = array(
    'voltar' => $this->createUrl('/dashboard'),
    'links' => array(
        array(
            'url' => $this->createUrl('veiculos/adicionar'),
            'icon' => 'assets/images/icons/x32-veiculo-adicionar.png',
            'label' => 'Adicionar'
        )
    )
);
?>
<h2>Veículos</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'veiculos-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idVeiculo',
            'filter' => false
        ),
        'matricula',
        array(
            'name' => 'idModelo',
            'value' => '$data->modelo->nome',
            'filter' => false
        ),
        array(
            'name' => 'idCliente',
            'value' => '$data->cliente->nome',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-veiculo-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("veiculos/editar", array("id" => $data->idVeiculo))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-veiculo-apagar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("veiculos/apagar", array("id" => $data->idVeiculo))',
        ),
    ),
));