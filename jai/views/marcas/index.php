<div id="titulo">
    <h2>Marcas</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('marcas/adicionar'); ?>"><img src="assets/images/icons/x16-marca-adicionar.png" /> Adicionar</a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'marca-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idMarca',
            'filter' => false
        ),
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-marca-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("marcas/editar", array("id" => $data->idMarca))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-marca-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("marcas/apagar", array("id" => $data->idMarca))',
        ),
    ),
));