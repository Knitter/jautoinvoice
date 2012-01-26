<?php
Yii::app()->clientScript->registerCssFile('css/formularios.cass');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'folhaobra-form',
    'enableAjaxValidation' => false,
    'focus' => array($folhaObra, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'data'),
    $form->textField($folhaObra, 'data'),
    $form->error($folhaObra, 'data');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'descricaoAvaria'),
    $form->textArea($folhaObra, 'descricaoAvaria', array('rows' => 5, 'cols' => 76)),
    $form->error($folhaObra, 'descricaoAvaria');
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
    echo $form->labelEx($folhaObra, 'idVeiculo'),
    $form->textField($folhaObra, 'idVeiculo', array('size' => 10, 'maxlength' => 10)),
    $form->error($folhaObra, 'idVeiculo');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($folhaObra, 'idFuncionario'),
    $form->textField($folhaObra, 'idFuncionario', array('size' => 10, 'maxlength' => 10)),
    $form->error($folhaObra, 'idFuncionario');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($folhaObra->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/obras'));
    ?>
</div>

<?php
$this->endWidget();