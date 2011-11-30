<div id="titulo">
    <h2>Fornecedores</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('fornecedores/adicionar'); ?>"><img src="assets/images/icons/x16-fornecedor-adicionar.png" /> Adicionar</a>
    </div>
    <div style="clear: both"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'idFornecedor',
            'filter' => false
        ),
        'nome',
        'email',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-fornecedor.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("fornecedores/editar", array("id" => $data->idFornecedor))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-fornecedor-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("fornecedores/apagar", array("id" => $data->idFornecedor))',
        ),
    ),
));