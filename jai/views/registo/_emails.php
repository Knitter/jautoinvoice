<div id="titulo">
    <h2>E-mails</h2>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'email-grid',
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
            'header' => 'Destinatário',
            'type' => 'raw',
            'value' => '($data->idCliente ? $data->cliente->nome : $data->fornecedor->nome)',
        ),
        'endereco:email',
        'data:date'
    ),
));

