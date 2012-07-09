<?php $this->titulo = 'Serviços Prestados'; ?>
<div id="titulo">
    <h2>Serviços</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('servicos/criar'); ?>"><img src="imagens/icones/servico.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'servico-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("servicos/editar", "id" => $data->idServico))'
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
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/servico-editar.png',
                    'url' => 'Yii::app()->createUrl("servicos/editar", array("id" => $data->idServico))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/servico-remover.png',
                    'url' => 'Yii::app()->createUrl("servicos/apagar", array("id" => $data->idServico))',
                )
            ),
        ),
    ),
));