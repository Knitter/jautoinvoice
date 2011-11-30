<div id="titulo">
    <h2>Combustíveis</h2>
    <div id="opcoes">
        <a href=""><img src="assets/images/icons/x16-combustivel-adicionar.png" /> Adicionar</a>
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
        array(
            'name' => 'idCombustivel',
            'filter' => false
        ),
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-combustivel-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("combustiveis/editar", array("id" => $data->idCombustivel))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-combustivel-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("combustiveis/apagar", array("id" => $data->idCombustivel))',
        ),
    ),
));