<?php
$this->title = 'Taxas de IVA'
?>
<div id="titulo">
    <h2>Taxas de IVA</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('iva/criar'); ?>"><img src="imagens/icones/x16.iva.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'iva-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'descricao',
            'type' => 'raw',
            'value' => 'CHtml::link($data->descricao, array("iva/editar", "id" => $data->idIVA))'
        ),
        array(
            'name' => 'percentagem',
            'filter' => false,
            'htmlOptions' => array('class' => 'small-column')
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.iva.editar.png',
                    'url' => 'Yii::app()->createUrl("iva/editar", array("id" => $data->idIVA))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.iva.apagar.png',
                    'url' => 'Yii::app()->createUrl("iva/apagar", array("id" => $data->idIVA))',
                )
            ),
        ),
    ),
));