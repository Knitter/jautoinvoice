<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'fornecedor-form',
    'enableAjaxValidation' => true,
    'focus' => array($fornecedor, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'nome'),
    $form->textField($fornecedor, 'nome', array('class' => 'medium-field', 'maxlength' => 255)),
    $form->error($fornecedor, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'email'),
    $form->textField($fornecedor, 'email', array('class' => 'medium-field', 'maxlength' => 255)),
    $form->error($fornecedor, 'email');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'telefone'),
    $form->textField($fornecedor, 'telefone', array('maxlength' => 9)),
    $form->error($fornecedor, 'telefone');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'telemovel'),
    $form->textField($fornecedor, 'telemovel', array('maxlength' => 9)),
    $form->error($fornecedor, 'telemove');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'website'),
    $form->textField($fornecedor, 'website', array('class' => 'medium-field', 'maxlength' => 255)),
    $form->error($fornecedor, 'website');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'morada'),
    $form->textField($fornecedor, 'morada', array('class' => 'long-field', 'maxlength' => 255)),
    $form->error($fornecedor, 'morada');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($fornecedor, 'notas'),
    $form->textArea($fornecedor, 'notas', array('cols' => 76, 'rows' => 5)),
    $form->error($fornecedor, 'notas');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($fornecedor->isNewRecord ? 'Criar' : 'Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/fornecedores'));
    ?>
</div>

<?php
$this->endWidget();