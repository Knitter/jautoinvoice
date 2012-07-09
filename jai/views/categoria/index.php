<?php $this->titulo = 'Categorias de Veículos'; ?>
<div id="titulo">
    <h2>Categorias</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('categorias/criar'); ?>"><img src="imagens/icones/categoria.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'categoria-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("categorias/editar", "id" => $data->idCategoria))'
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
                    'imageUrl' => 'imagens/icones/categoria.editar.png',
                    'url' => 'Yii::app()->createUrl("categorias/editar", array("id" => $data->idCategoria))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/categoria.remover.png',
                    'url' => 'Yii::app()->createUrl("categorias/apagar", array("id" => $data->idCategoria))',
                )
            ),
        ),
    ),
));