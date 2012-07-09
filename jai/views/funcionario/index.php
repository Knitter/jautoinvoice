<?php $this->titulo = 'Funcionários'; ?>
<div id="titulo">
    <h2>Funcionários</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('funcionarios/criar'); ?>"><img src="imagens/icones/funcionario.adicionar.png" /></a>
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
            'headerHtmlOptions' => array('class' => 'small-column'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/funcionario-remover.png',
                    'url' => 'Yii::app()->createUrl("funcionarios/apagar", array("id" => $data->idFuncionario))'
                ),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/funcionario-editar.png',
                    'url' => 'Yii::app()->createUrl("funcionarios/editar", array("id" => $data->idFuncionario))',
                ),
            ),
        ),
    ),
));