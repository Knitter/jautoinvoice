<?php $this->title = 'Folhas de Obra'; ?>

<div id="titulo">
    <h2>Folhas de Obra</h2>
    <div id="opcoes">
        <!-- <a href="<?php echo $this->createUrl('obras/modelo'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/impressora.png" /></a> -->
        <a href="<?php echo $this->createUrl('obras/criar'); ?>"><img src="<?php echo Yii::app()->baseUrl; ?>/resources/imagens/icones/folhaobra.adicionar.png" /></a>
    </div>
    <div class="clear"></div>
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
                'class' => 'buttons-3'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                //'imprimir' => array(
                //    'imageUrl' => 'imagens/icones/impressora.png',
                //    'url' => 'Yii::app()->createUrl("obras/imprimir", array("id" => $data->idFolhaObra))',
                //),
                'update' => array(
                    'imageUrl' => 'imagens/icones/folhaobra.editar.png',
                    'url' => 'Yii::app()->createUrl("obras/editar", array("id" => $data->idFolhaObra))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/folhaobra.remover.png',
                    'url' => 'Yii::app()->createUrl("obras/apagar", array("id" => $data->idFolhaObra))',
                )
            ),
            //'template' => '{imprimir} {update} {delete}'
        ),
    ),
));