<h2>Fornecedores</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idFornecedor',
            'filter' => false
        ),
        'nome',
        'email',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-fornecedor.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("fornecedores/editar", array("id" => $data->idFornecedor))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-fornecedor-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("fornecedores/apagar", array("id" => $data->idFornecedor))',
        ),
    ),
));