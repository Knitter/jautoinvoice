<?php
$this->title = 'Fornecedores';
?>

<div id="titulo">
    <h2>Fornecedores</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('fornecedores/criar'); ?>"><img src="imagens/icones/fornecedor.adicionar.png" /></a>
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
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("fornecedores/editar", "id" => $data->idFornecedor))'
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Contactar',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array('visible' => 'false'),
                'delete' => array('visible' => 'false'),
                'email' => array(
                    'label' => 'Enviar e-mail',
                    'imageUrl' => 'imagens/icones/email.png',
                    'url' => '"javascript:caixaEmail({$data->idFornecedor})";'
                ),
            ),
            'template' => '{email}',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/fornecedor.editar.png',
                    'url' => 'Yii::app()->createUrl("fornecedores/editar", array("id" => $data->idFornecedor))'
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/fornecedor.remover.png',
                    'url' => 'Yii::app()->createUrl("fornecedores/apagar", array("id" => $data->idFornecedor))',
                )
            ),
        ),
    ),
));
?>

<?php
$this->renderPartial('//_common/_email', array('url' => $this->createUrl('fornecededores/email')));
