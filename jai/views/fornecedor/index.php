<?php
$this->titulo = 'Fornecedores';
?>

<div id="titulo">
    <h2>Fornecedores</h2>
    
    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/fornecedor-adicionar.png'), $this->createUrl('fornecedor/adicionar')); ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'funcionario-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'nome',
            'type' => 'raw',
            'value' => 'CHtml::link($data->nome, array("fornecedor/editar", "id" => $data->idFornecedor))'
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
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/fornecedor-editar.png',
                    'url' => 'Yii::app()->createUrl("fornecedor/editar", array("id" => $data->idFornecedor))'
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/fornecedor-remover.png',
                    'url' => 'Yii::app()->createUrl("fornecedor/apagar", array("id" => $data->idFornecedor))',
                )
            ),
        ),
    ),
));
?>

<?php
$this->renderPartial('//_comum/_email', array('url' => $this->createUrl('fornecededor/email')));
