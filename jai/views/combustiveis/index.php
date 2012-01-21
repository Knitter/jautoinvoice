<div id="titulo">
    <h2>Combustíveis</h2>
    <div id="opcoes">
        <a href=""><img src="imagens/icones/x16.combustivel.criar.png" /> Criar</a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'combustivel-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.combustivel.editar.png',
                    'url' => 'Yii::app()->createUrl("combustiveis/editar", array("id" => $data->idCombustivel))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.combustivel.apagar.png',
                    'url' => 'Yii::app()->createUrl("combustiveis/apagar", array("id" => $data->idCombustivel))',
                )
            ),
        ),
    ),
));