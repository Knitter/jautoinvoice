<div id="titulo">
    <h2>Folhas de Obra</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('folhasobra/adicionar'); ?>"><img src="assets/images/icons/x16-cliente-adicionar.png" /> Adicionar</a>
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
            'name' => 'idFolhaObra',
            'filter' => false
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-folhaobra-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("folhasobra/editar", array("id" => $data->idFolhaObra))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-folhaobra-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("folhasobra/apagar", array("id" => $data->idFolhaObra))',
        ),
    ),
));