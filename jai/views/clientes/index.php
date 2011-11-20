<div class="span-18">
    <span class="title-h2">Clientes</span>
</div>
<div class="span-6 last">
    <a href="<?php echo $this->createUrl('clientes/adicionar'); ?>"><img src="assets/images/icons/x16-cliente-adicionar.png" /></a>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
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
            'deleteButtonImageUrl' => 'assets/images/icons/x16-cliente-apagar.png'
        ),
    ),
));