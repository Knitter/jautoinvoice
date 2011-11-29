<?php
$this->menu = array(
    'voltar' => $this->createUrl('/dashboard'),
    'links' => array(
        array(
            'url' => $this->createUrl('folhasobra/adicionar'),
            'icon' => 'assets/images/icons/x32-folhaobra-adicionar.png',
            'label' => 'Adicionar'
        )
    )
);
?>
<h2>Folhas de Obra</h2>

<?php /*
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'folhaobra-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
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
            'updateButtonImageUrl' => 'assets/images/icons/.png',
            'deleteButtonImageUrl' => 'assets/images/icons/.png'
        ),
    ),
)); */