<?php $this->title = 'Funcionários'; ?>
<div id="titulo">
    <h2>Funcionários</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('funcionarios/criar'); ?>"><img src="imagens/icones/x16.funcionario.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("funcionarios/editar", "id" => $data->idFuncionario))'
        ),
        array(
            'name' => 'contribuinte',
            'htmlOptions' => array('class' => 'small-column'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.funcionario.apagar.png',
                    'url' => 'Yii::app()->createUrl("funcionarios/apagar", array("id" => $data->idFuncionario))'
                ),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.funcionario.editar.png',
                    'url' => 'Yii::app()->createUrl("funcionarios/editar", array("id" => $data->idFuncionario))',
                ),
            ),
        ),
    ),
));