<?php $this->title = 'Folhas de Obra'; ?>

<div id="titulo">
    <h2>Folhas de Obra</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('obras/criar'); ?>"><img src="imagens/icones/folhaobra.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'folhaobra-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'matricula',
            'headerHtmlOptions' => array('class' => 'small-column')
        ),
        array(
            'name' => 'data',
            'headerHtmlOptions' => array('class' => 'small-column')
        ),
        array(
            'name' => 'idFuncionario',
            'type' => 'raw',
            'value' => '$data->funcionario->nome',
            'filter' => CHtml::listData($funcionarios, 'idFuncionario', 'nome')
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
                    'imageUrl' => 'imagens/icones/folhaobra.editar.png',
                    'url' => 'Yii::app()->createUrl("folhasobra/editar", array("id" => $data->idFolhaObra))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/folhaobra.remover.png',
                    'url' => 'Yii::app()->createUrl("folhasobra/apagar", array("id" => $data->idFolhaObra))',
                )
            ),
        ),
    ),
));