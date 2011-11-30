<div id="titulo">
    <h2>Materiais</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('materiais/adicionar'); ?>"><img src="assets/images/icons/x16-material-adicionar.png" /> Adicionar</a>
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
        array(
            'name' => 'idMaterial',
            'filter' => false
        ),
        'referencia',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-material-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("materiais/editar", array("id" => $data->idMaterial))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-material-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("materiais/apagar", array("id" => $data->idMaterial))',
        ),
    ),
));