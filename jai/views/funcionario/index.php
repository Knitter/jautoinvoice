<?php $this->titulo = 'Funcionários'; ?>

<div id="titulo">
    <h2>Funcionários</h2>
    
    <div id="opcoes">
        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/empregado-adicionar.png'), $this->createUrl('funcionario/adicionar')); ?>
    </div>
    <div cçass="clear"></div>
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
            'value' => 'CHtml::link($data->nome, array("funcionario/editar", "id" => $data->idFuncionario))'
        ),
        array(
            'name' => 'contribuinte',
            'headerHtmlOptions' => array('class' => 'small-column'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Operações',
            'headerHtmlOptions' => array(
                'class' => 'buttons-2'
            ),
            'buttons' => array(
                'view' => array('visible' => 'false'),
                'delete' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/empregado-remover.png',
                    'url' => 'Yii::app()->createUrl("funcionario/apagar", array("id" => $data->idFuncionario))'
                ),
                'update' => array(
                    'imageUrl' => Yii::app()->baseUrl. '/recursos/imagens/icones/empregado-editar.png',
                    'url' => 'Yii::app()->createUrl("funcionario/editar", array("id" => $data->idFuncionario))',
                ),
            ),
        ),
    ),
));