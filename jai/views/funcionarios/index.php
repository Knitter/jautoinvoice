<div class="span-18">
    <span class="title-h2">Funcionários</span>
</div>
<div class="span-6 last">
    <a href="<?php echo $this->createUrl('funcionarios/adicionar'); ?>"><img src="assets/images/icons/x16-funcionario-adicionar.png" /></a>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'columns' => array(
        'idFuncionario',
        'nome',
        'contribuinte',
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false')
            ),
            'updateButtonImageUrl' => 'assets/images/icons/x16-funcionario-editar.png',
            'deleteButtonImageUrl' => 'assets/images/icons/x16-funcionario-apagar.png'
        ),
    ),
));