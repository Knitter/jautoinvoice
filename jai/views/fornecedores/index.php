<?php
Yii::app()->clientScript->registerScriptFile('js/colorbox/jquery.colorbox.min.js');
Yii::app()->clientScript->registerScriptFile('js/jai/default.js');

Yii::app()->clientScript->registerCssFile('css/colorbox/jquery.colorbox.css');
?>

<div id="titulo">
    <h2>Fornecedores</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('fornecedores/criar'); ?>"><img src="imagens/icones/x16.fornecedor.criar.png" /> Criar</a>
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
        'nome',
        array(
            'class' => 'CButtonColumn',
            'header' => 'Contactar',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array('visible' => 'false'),
                'delete' => array('visible' => 'false'),
                'email' => array(
                    'label' => 'Enviar e-mail',
                    'imageUrl' => 'imagens/icones/x16.email.png',
                    'url' => '"javascript:caixaEmail({$data->idFornecedor})";'
                ),
            ),
            'template' => '{email}'
        ),
        array(
            'class' => 'CButtonColumn',
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => 'imagens/icones/x16.fornecedor.png',
                    'url' => 'Yii::app()->createUrl("fornecedores/editar", array("id" => $data->idFornecedor))'
                ),
                'delete' => array(
                    'imageUrl' => 'imagens/icones/x16.fornecedor.apagar.png',
                    'url' => 'Yii::app()->createUrl("fornecedores/apagar", array("id" => $data->idFornecedor))',
                )
            ),
        ),
    ),
));
?>

<div style="display: none">
    <div id="emailForm">
        <?php $this->renderPartial('//_common/_email'); ?>
    </div>
</div>