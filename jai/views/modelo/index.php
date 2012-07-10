<?php $this->titulo = 'Modelos de Veículos'; ?>

<div id="titulo">
    <h2>Modelos</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-adicionar.png'), $this->createUrl('modelo/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'marca-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("modelos/editar", "id" => $data->idModelo))'
        ),
        array(
            'name' => 'idMarca',
            'value' => '$data->marca->nome',
            'filter' => CHtml::listData($marcas, 'idMarca', 'nome'),
            'headerHtmlOptions' => array('class' => 'small-column')
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
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-editar.png',
                    'url' => 'Yii::app()->createUrl("modelos/editar", array("id" => $data->idMarca))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-remover.png',
                    'url' => 'Yii::app()->createUrl("modelos/apagar", array("id" => $data->idMarca))'
                )
            ),
        ),
    ),
));