<h2>Funcionários</h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idFuncionario',
            'filter' => false
        ),
        'nome',
        'contribuinte',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-funcionario-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("funcionarios/editar", array("id" => $data->idFuncionario))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-funcionario-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("funcionarios/apagar", array("id" => $data->idFuncionario))'
        ),
    ),
));