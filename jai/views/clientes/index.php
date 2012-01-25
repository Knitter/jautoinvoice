<?php
$this->title = 'Clientes';
Yii::app()->clientScript->registerScriptFile('js/jai/default.js');
?>

<div id="titulo">
    <h2>Clientes</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('clientes/criar'); ?>"><img src="imagens/icones/x16.cliente.criar.png" /></a>
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
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("clientes/editar", "id" => $data->idCliente))'
        ),
        array(
            'name' => 'contribuinte',
            'htmlOptions' => array('class' => 'small-column')
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Contactar',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array('visible' => 'false'),
                'delete' => array('visible' => 'false'),
                'email' => array(
                    'label' => 'Enviar e-mail',
                    'imageUrl' => 'imagens/icones/x16.email.png',
                    'url' => '"javascript:caixaEmail({$data->idCliente})";'
                ),
                'sms' => array(
                    'label' => 'Enviar SMS',
                    'imageUrl' => 'imagens/icones/x16.sms.png',
                    'url' => '"javascript:caixaSms({$data->idCliente})";'
                )
            ),
            'template' => '{email} {sms}'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.cliente.editar.png',
                    'url' => 'Yii::app()->createUrl("clientes/editar", array("id" => $data->idCliente))'
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.cliente.apagar.png',
                    'url' => 'Yii::app()->createUrl("clientes/apagar", array("id" => $data->idCliente))'
                ),
                'carros' => array(
                    'label' => 'Veículos',
                    'imageUrl' => 'imagens/icones/x16.veiculo.png',
                    'url' => 'Yii::app()->createUrl("veiculos/lista", array("id" => $data->idCliente, "op" => "lista"))'
                ),
            ),
            'template' => '{update} {delete} {carros}'
        ),
    ),
));

$this->renderPartial('//_common/_sms');

$this->renderPartial('//_common/_email');