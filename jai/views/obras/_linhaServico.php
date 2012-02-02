<?php
$js = <<<JS
urlMaterial = '{$this->createUrl('stock/dadosJSON')}';
urlServico = '{$this->createUrl('servicos/dadosJSON')}';
urlFuncionario = '{$this->createUrl('funcionarios/dadosJSON')}';
JS;

Yii::app()->clientScript->registerScript('initUrls', $js);

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlgLinhaServico',
    'options' => array(
        'title' => 'Adicionar Serviço',
        'autoOpen' => false,
        'minWidth' => 640,
        'close' => 'js:limparCamposDlgLinhaServico'
    ),
));
?>

<div class="row">
    <?php
    echo CHtml::label('Funcionário', 'funcionario'),
    CHtml::dropDownList('funcionario', null, CHtml::listData($funcionarios, 'idFuncionario', 'nome'), array(
        'empty' => '- funcionário -',
        'onchange' => 'verificarBotaoAdicionar();'
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Serviço', 'servico'),
    CHtml::dropDownList('servico', null, CHtml::listData($servicos, 'idServico', 'nome'), array(
        'empty' => '- serviço -',
        'onchange' => 'verificarBotaoAdicionar();'
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
                    'empty' => '- material usado -',
                    'onchange' => 'verificarBotaoAdicionarLG();'
                ));
                ?>
            </td>
            <td></td>
            <td>
                <?php
                echo CHtml::link(CHtml::image('imagens/icones/adicionar.png'), 'javascript:;', array(
                    'onclick' => 'criarLinhaGasto();',
                    'id' => 'btnAdicionarLG'
                ));
                ?>
            </td>
        </tr>
    </table>
</fieldset>

<div class="row">
    <?php
    echo CHtml::button('Adicionar', array(
        'id' => 'btnAdicionarLS',
        'onclick' => 'criarLinhaServico();',
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', 'javascript:;', array('onclick' => "javascript:$('#dlgLinhaServico').dialog('close');"));
    ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');