<?php
$this->title = 'Clientes';
?>

<div id="titulo">
    <h2>Clientes</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('clientes/criar'); ?>"><img src="imagens/icones/cliente.adicionar.png" /></a>
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
            'headerHtmlOptions' => array('class' => 'small-column')
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Contactar',
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array('visible' => 'false'),
                'delete' => array('visible' => 'false'),
                'email' => array(
                    'label' => 'Enviar e-mail',
                    'imageUrl' => 'imagens/icones/email.png',
                    'url' => '"javascript:caixaEmail({$data->idCliente})";'
                ),
                'sms' => array(
                    'label' => 'Enviar SMS',
                    'imageUrl' => 'imagens/icones/sms.png',
                    'url' => '"javascript:caixaSms({$data->idCliente})";'
                )
            ),
            'template' => '{email} {sms}'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'buttons-3'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/cliente.editar.png',
                    'url' => 'Yii::app()->createUrl("clientes/editar", array("id" => $data->idCliente))'
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/cliente.remover.png',
                    'url' => 'Yii::app()->createUrl("clientes/apagar", array("id" => $data->idCliente))'
                ),
                'carros' => array(
                    'label' => 'Veículos',
                    'imageUrl' => 'imagens/icones/veiculo.png',
                    'url' => 'Yii::app()->createUrl("veiculos/lista", array("id" => $data->idCliente, "op" => "lista"))'
                ),
            ),
            'template' => '{update} {delete} {carros}'
        ),
    ),
));

$this->renderPartial('//_common/_sms');

$this->renderPartial('//_common/_email', array('url' => $this->createUrl('clientes/email')));