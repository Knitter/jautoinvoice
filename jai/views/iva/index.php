<div id="titulo">
    <h2>Taxas de IVA</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('iva/adicionar'); ?>"><img src="assets/images/icons/x16-iva-adicionar.png" /> Adicionar</a>
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
            'name' => 'idIVA',
            'filter' => false
        ),
        'descricao',
        'percentagem',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-iva-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("iva/editar", array("id" => $data->idIVA))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-iva-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("iva/apagar", array("id" => $data->idIVA))',
        ),
    ),
));