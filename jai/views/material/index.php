<?php $this->titulo = 'Gestão de Stock'; ?>

<div id="titulo">
    <h2>Stock</h2>
    
    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/material-adicionar.png'), $this->createUrl('material/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'material-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("material/editar", "id" => $data->idMaterial))'
        ),
        array(
            'name' => 'referencia',
            'type' => 'raw',
            'value' => 'CHtml::link($data->referencia, array("material/editar", "id" => $data->idMaterial))',
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
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/material-editar.png',
                    'url' => 'Yii::app()->createUrl("material/editar", array("id" => $data->idMaterial))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/material-remover.png',
                    'url' => 'Yii::app()->createUrl("material/apagar", array("id" => $data->idMaterial))',
                )
            ),
        ),
    ),
));