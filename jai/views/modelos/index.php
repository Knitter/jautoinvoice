<div id="titulo">
    <h2>Modelos</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('modelos/criar'); ?>"><img src="imagens/icones/x16.modelo.criar.png" /> Criar</a>
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
        'nome',
        array(
            'name' => 'idMarca',
            'value' => '$data->marca->nome',
            'filter' => CHtml::listData($marcas, 'idMarca', 'nome')
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.modelo.editar.png',
                    'url' => 'Yii::app()->createUrl("marcas/editar", array("id" => $data->idMarca))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.modelo.apagar.png',
                    'url' => 'Yii::app()->createUrl("marcas/apagar", array("id" => $data->idMarca))'
                )
            ),
        ),
    ),
));