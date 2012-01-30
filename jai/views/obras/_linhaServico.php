<?php
$js = <<<JS
globais.url.funcionarios = '{$this->createUrl('funcionarios/dadosJSON')}';
globais.url.servicos = '{$this->createUrl('servicos/dadosJSON')}';
globais.url.materiais = '{$this->createUrl('stock/dadosJSON')}';
JS;

Yii::app()->clientScript->registerScript('urls', $js);

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlgLinhaServico',
    'options' => array(
        'title' => 'Adicionar Serviço',
        'autoOpen' => false,
        'minWidth' => 960,
        'close' => 'js:limparCamposDlgLinhaServico'
    ),
));
?>

<div class="row">
    <?php
    echo CHtml::label('Funcionário', 'funcionario'),
    CHtml::dropDownList('funcionario', null, CHtml::listData($funcionarios, 'idFuncionario', 'nome'), array(
        'empty' => '- funcionário -',
        'onchange' => 'pedirDadosFuncionario();'
    ));
    ?>
</div>

<div class="row">
    <?php echo CHtml::label('Valor/Hora', 'valorHora'), CHtml::textField('valorHora', null, array('class' => 'small-field')), '&nbsp;&euro;'; ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Serviço', 'servico'),
    CHtml::dropDownList('servico', null, CHtml::listData($servicos, 'idServico', 'nome'), array(
        'empty' => '- serviço -',
        'onchange' => 'pedirDadosServico();'
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Valor', 'valor'),
    CHtml::textField('valor', null, array('class' => 'small-field'))
    , '&nbsp;&euro;';
    ?>
    <span id="dscIva"></span>
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
            <th>Quantidade</th>
            <th>Material</th>
            <th>Preço Uni. ( &euro; )</th>
            <th>IVA</th>
            <th>Desconto ( &euro; )</th>
            <th>Sub-total ( &euro; )</th>
            <th style="width: 22px;"></th>
        </tr>
        <tr>
            <td><?php echo CHtml::textField('quantidade', null, array('class' => 'small-field')); ?></td>
            <td>
                <?php
                echo CHtml::dropDownList('material', null, CHtml::listData($materiais, 'idMaterial', 'nome'), array(
                    'empty' => '- material usado -',
                    'onchange' => 'pedirDadosMaterial();'
                ));
                ?>
            </td>
            <td><?php echo CHtml::textField('precoUnitario', null, array('class' => 'small-field')); ?></td>
            <td></td>
            <td><?php echo CHtml::textField('desconto', 0, array('class' => 'small-field')); ?></td>
            <td></td>
            <td>
                <?php
                echo CHtml::button('+', array(
                    'onclick' => 'criarLinhaGasto();',
                    'disabled' => 'disabled',
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
        'disabled' => 'disabled',
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar');
    ?>
</div>

<?php
echo CHtml::hiddenField('valorIvaServico'), CHtml::hiddenField('idIvaServico'),
 CHtml::hiddenField('descIvaServico'), CHtml::hiddenField('maxDesconto'),
 CHtml::hiddenField('descIvaMaterial'), CHtml::hiddenField('valorIvaMaterial'),
 CHtml::hiddenField('idIvaMaterial');

$this->endWidget('zii.widgets.jui.CJuiDialog');