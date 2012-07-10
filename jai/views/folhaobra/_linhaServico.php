<?php
$js = <<<JS
g.folhasObra.urls.material = '{$this->createUrl('stock/dadosJSON')}';
g.folhasObra.urls.servico = '{$this->createUrl('servicos/dadosJSON')}';
g.folhasObra.urls.funcionario = '{$this->createUrl('funcionarios/dadosJSON')}';
JS;

Yii::app()->clientScript->registerScript('initFolhasObra', $js);

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlgLinhaServico',
    'options' => array(
        'title' => 'Adicionar Serviço',
        'autoOpen' => false,
        'minWidth' => 640,
        'buttons' => array(
            array(
                'text' => 'Criar',
                'click' => 'js:criarLinhaServico'
            ),
            array(
                'text' => 'Cancelar',
                'click' => 'js:function () {$("#dlgLinhaServico").dialog("close");}'
            ),
        ),
        'close' => 'js:limparCamposDlgLinhaServico'
    ),
));
?>

<div class="row">
    <?php
    echo CHtml::label('Funcionário', 'funcionario'),
    CHtml::dropDownList('funcionario', null, CHtml::listData($funcionarios, 'idFuncionario', 'nome'), array(
        'empty' => '- funcionário -'
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Serviço', 'servico'),
    CHtml::dropDownList('servico', null, CHtml::listData($servicos, 'idServico', 'nome'), array(
        'empty' => '- serviço -'
    ));
    ?>
</div>

<div class="row">
    <?php echo CHtml::label('Duração', 'duracao'), CHtml::textField('duracao', null, array('class' => 'small-field')); ?> (horas)
</div>

<div class="row">
    <?php echo CHtml::label('Notas', 'notas'), CHtml::textField('notas', null, array('class' => 'medium-field')); ?>
</div>

<fieldset>
    <legend>Gastos de Material</legend>
    <table id="linhasGasto">
        <tr>
            <th class="small-column">Quantidade</th>
            <th>Material</th>
            <th>Sub-total ( &euro; )</th>
            <th style="width: 22px;"></th>
        </tr>
        <tr>
            <td><?php echo CHtml::textField('quantidade', null, array('class' => 'small-field')); ?></td>
            <td>
                <?php
                echo CHtml::dropDownList('material', null, CHtml::listData($materiais, 'idMaterial', 'nome'), array(
                    'empty' => '- material usado -'
                ));
                ?>
            </td>
            <td></td>
            <td>
                <?php
                echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/adicionar.png'), 'javascript:;', array(
                    'onclick' => 'criarLinhaGasto();',
                    'id' => 'btnAdicionarLG'
                ));
                ?>
            </td>
        </tr>
    </table>
</fieldset>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');