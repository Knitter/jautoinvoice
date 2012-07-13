<div id="titulo">
    <h2>SMS</h2>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'sms-grid',
    'dataProvider' => $filtro->search(),
    //'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idFuncionario',
            'type' => 'raw',
            'value' => '$data->funcionario->nome'
        ),
        array(
            'name' => 'idCliente',
            'type' => 'raw',
            'value' => '$data->cliente->nome'
        ),
        'numero',
        'data:date'
    ),
));

