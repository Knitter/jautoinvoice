<div class="span-18">
    <span class="title-h2">Fornecedores</span>
</div>
<div class="span-6 last">
    <a href="<?php echo $this->createUrl('fornecedores/adicionar'); ?>"><img src="assets/images/icons/x16-fornecedor-adicionar.png" /></a>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
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
            'deleteButtonImageUrl' => 'assets/images/icons/x16-fornecedor-apagar.png'
        ),
    ),
));