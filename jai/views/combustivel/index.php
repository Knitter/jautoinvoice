<?php $this->titulo = 'Combustíveis/Fontes de Energia'; ?>

<div id="titulo">
    <h2>Combustíveis/Fontes de Energia</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/combustivel-adicionar.png'), $this->createUrl('combustivel/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'combustivel-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("combustiveis/editar", "id" => $data->idCombustivel))'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/combustivel-editar.png',
                    'url' => 'Yii::app()->createUrl("combustiveis/editar", array("id" => $data->idCombustivel))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/combustivel-remover.png',
                    'url' => 'Yii::app()->createUrl("combustiveis/apagar", array("id" => $data->idCombustivel))',
                )
            ),
        ),
    ),
));