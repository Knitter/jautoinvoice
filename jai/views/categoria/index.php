<?php $this->titulo = 'Categorias de Veículos'; ?>

<div id="titulo">
    <h2>Categorias</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/categoria-adicionar.png'), $this->createUrl('categoria/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'categoria-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("categoria/editar", "id" => $data->idCategoria))'
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
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/categoria-editar.png',
                    'url' => 'Yii::app()->createUrl("categoria/editar", array("id" => $data->idCategoria))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/categoria-remover.png',
                    'url' => 'Yii::app()->createUrl("categoria/apagar", array("id" => $data->idCategoria))',
                )
            ),
        ),
    ),
));