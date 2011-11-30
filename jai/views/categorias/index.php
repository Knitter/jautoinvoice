<div id="titulo">
    <h2>Categorias</h2>
    <div id="opcoes">
        <a href=""><img src="assets/images/icons/x16-categoria-adicionar.png" /> Adicionar</a>
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
            'name' => 'idCategoria',
            'filter' => false
        ),
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-categoria-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("categorias/editar", array("id" => $data->idCategoria))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-categoria-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("categorias/apagar", array("id" => $data->idCategoria))',
        ),
    ),
));