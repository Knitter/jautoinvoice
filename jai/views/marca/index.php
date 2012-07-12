<?php $this->titulo = 'Marcas de Veículos'; ?>

<div id="titulo">
    <h2>Marcas</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/marca-adicionar.png'), $this->createUrl('marca/adicionar')); ?>
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
            'value' => 'CHtml::link($data->nome, array("marca/editar", "id" => $data->idMarca))'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'coluna-botoes2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/marca-editar.png',
                    'url' => 'Yii::app()->createUrl("marca/editar", array("id" => $data->idMarca))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/marca-remover.png',
                    'url' => 'Yii::app()->createUrl("marca/apagar", array("id" => $data->idMarca))'
                )
            ),
        ),
    ),
));