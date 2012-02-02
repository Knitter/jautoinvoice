<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');
Yii::app()->clientScript->registerScriptFile('js/jai/folhasobra.js');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'folhaobra-form',
    'enableAjaxValidation' => false,
    'focus' => array($folhaObra, 'matricula')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'matricula');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'model' => $folhaObra,
        'attribute' => 'matricula',
        'sourceUrl' => $this->createUrl('veiculos/acmatricula'),
        'options' => array(
            'minLength' => '3'
        )
    ));

    echo $form->error($folhaObra, 'matricula');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'data');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $folhaObra,
        'attribute' => 'data'
    ));

    echo $form->error($folhaObra, 'data');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'kms'),
    $form->textField($folhaObra, 'kms', array('class' => 'small-field')),
    $form->error($folhaObra, 'kms');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'idFuncionario'),
    $form->dropDownList($folhaObra, 'idFuncionario', CHtml::listData($funcionarios, 'idFuncionario', 'nome')),
    $form->error($folhaObra, 'idFuncionario');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'descricaoAvaria'),
    $form->textArea($folhaObra, 'descricaoAvaria', array('rows' => 5, 'cols' => 76)),
    $form->error($folhaObra, 'descricaoAvaria');
    ?>
</div>

<fieldset>
    <legend>Serviços Prestados</legend>
    <table id="linhasServico">
        <tr>
            <th>Funcionário</th>
            <th>Serviço</th>
            <th class="small-column">Duração (horas)</th>
            <th>Notas</th>
            <th class="small-column">Preço ( &euro; )</th>
            <th style="width: 22px;"><?php echo CHtml::button('+', array('onclick' => 'adicionarLinhaServico();')); ?></th>
        </tr>
    </table>
</fieldset>

<div class="row">
    <?php
    echo CHtml::submitButton($folhaObra->isNewRecord ? 'Criar' : 'Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/obras'));
    ?>
</div>

<?php
$this->endWidget();

$this->renderPartial('_linhaServico', array(
    'funcionarios' => $funcionarios,
    'servicos' => $servicos,
    'materiais' => $materiais
));