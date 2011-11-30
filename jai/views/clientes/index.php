<div id="titulo">
    <h2>Clientes</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('clientes/adicionar'); ?>"><img src="assets/images/icons/x16-cliente-adicionar.png" /> Adicionar</a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idCliente',
            'filter' => false
        ),
        'nome',
        'contribuinte',
        'telefone',
        'telemovel',
        array(
            'class' => 'CLinkColumn',
            'header' => 'E-mail',
            'imageUrl' => 'assets/images/icons/x16-email.png',
            'labelExpression' => '$data->email',
            'urlExpression' => '"mailto://" . ($data->email ? $data->email : "#")',
            'htmlOptions' => array('style' => 'text-align:center'),
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-cliente-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("clientes/editar", array("id" => $data->idCliente))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-cliente-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("clientes/apagar", array("id" => $data->idCliente))',
        ),
    ),
));