<?php $this->titulo = 'Folhas de Obra'; ?>

<div id="titulo">
    <h2>Folhas de Obra</h2>
    
    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/folhaobra-adicionar.png'), $this->createUrl('folhaobra/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'folhaobra-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
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
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/folhaobra-editar.png',
                    'url' => 'Yii::app()->createUrl("obras/editar", array("id" => $data->idFolhaObra))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/folhaobra-remover.png',
                    'url' => 'Yii::app()->createUrl("obras/apagar", array("id" => $data->idFolhaObra))',
                )
            ),
        ),
    ),
));