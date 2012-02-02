<?php $this->title = 'Marcas de Veículos'; ?>

<div id="titulo">
    <h2>Marcas</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('marcas/criar'); ?>"><img src="imagens/icones/marca.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'marca-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("marcas/editar", "id" => $data->idMarca))'
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
                    'imageUrl' => 'imagens/icones/marca.editar.png',
                    'url' => 'Yii::app()->createUrl("marcas/editar", array("id" => $data->idMarca))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/marca.remover.png',
                    'url' => 'Yii::app()->createUrl("marcas/apagar", array("id" => $data->idMarca))'
                )
            ),
        ),
    ),
));