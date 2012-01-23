<div id="titulo">
    <h2>Serviços</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('servicos/criar'); ?>"><img src="imagens/icones/x16.servico.criar.png" /></a>
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
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.servico.editar.png',
                    'url' => 'Yii::app()->createUrl("servicos/editar", array("id" => $data->idServico))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.servico.apagar.png',
                    'url' => 'Yii::app()->createUrl("servicos/apagar", array("id" => $data->idServico))',
                )
            ),
        ),
    ),
));