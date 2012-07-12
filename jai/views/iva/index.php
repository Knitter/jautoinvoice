<?php $this->titulo = 'Taxas de IVA'; ?>

<div id="titulo">
    <h2>Taxas de IVA</h2>

    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/iva-adicionar.png'), $this->createUrl('iva/adicionar')); ?>
    </div>
    
    <div class="clear"></div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'iva-grid',
    'dataProvider' => $filtro->search(),
    'filter' => $filtro,
    'cssFile' => false,
    'summaryText' => 'A mostrar {start} - {end} de {count} registo(s).',
    'template' => '{items} {pager} {summary}',
    'columns' => array(
        array(
            'name' => 'descricao',
            'type' => 'raw',
            'value' => 'CHtml::link($data->descricao, array("iva/editar", "id" => $data->idIva))'
        ),
        array(
            'name' => 'percentagem',
            'filter' => false,
            'headerHtmlOptions' => array('class' => 'small-column')
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'coluna-botoes2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/iva-editar.png',
                    'url' => 'Yii::app()->createUrl("iva/editar", array("id" => $data->idIva))',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl . '/recursos/imagens/icones/iva-remover.png',
                    'url' => 'Yii::app()->createUrl("iva/apagar", array("id" => $data->idIva))',
                )
            ),
        ),
    ),
));