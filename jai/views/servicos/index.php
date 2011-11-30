<div id="titulo">
    <h2>Serviços</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('servicos/adicionar'); ?>"><img src="assets/images/icons/x16-servico-adicionar.png" /> Adicionar</a>
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
            'name' => 'idServico',
            'filter' => false
        ),
        'nome',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-servico-editar.png',
            'updateButtonUrl' => 'Yii::app()->createUrl("servicos/editar", array("id" => $data->idServico))',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-servico-apagar.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("servicos/apagar", array("id" => $data->idServico))',
        ),
    ),
));