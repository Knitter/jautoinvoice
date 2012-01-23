<div id="titulo">
    <h2>Materiais</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('materiais/criar'); ?>"><img src="imagens/icones/x16.material.criar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'material-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        'referencia',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.material.editar.png',
                    'url' => 'Yii::app()->createUrl("materiais/editar", array("id" => $data->idMaterial))',
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.material.apagar.png',
                    'url' => 'Yii::app()->createUrl("materiais/apagar", array("id" => $data->idMaterial))',
                )
            ),
        ),
    ),
));