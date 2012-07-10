<?php $this->titulo = 'Clientes'; ?>

<div id="titulo">
    <h2>Clientes</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/cliente-adicionar.png'), $this->createUrl('cliente/adicionar')); ?>
    </div>
    <div class="clear"></div>
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
            'value' => 'CHtml::link($data->nome, array("cliente/editar", "id" => $data->idCliente))'
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
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/email.png',
                    'url' => '"javascript:caixaEmail({$data->idCliente})";'
                ),
                'sms' => array(
                    'label' => 'Enviar SMS',
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/sms.png',
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
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/cliente-editar.png',
                    'url' => 'Yii::app()->createUrl("cliente/editar", array("id" => $data->idCliente))'
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/cliente-remover.png',
                    'url' => 'Yii::app()->createUrl("cliente/apagar", array("id" => $data->idCliente))'
                ),
                'carros' => array(
                    'label' => 'Veículos',
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/veiculo.png',
                    'url' => 'Yii::app()->createUrl("veiculo/lista", array("id" => $data->idCliente, "op" => "lista"))'
                ),
            ),
            'template' => '{update} {delete} {carros}'
        ),
    ),
));

$this->renderPartial('//_comum/_sms');

$this->renderPartial('//_comum/_email', array('url' => $this->createUrl('cliente/email')));