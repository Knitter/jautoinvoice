<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'funcionario-form',
    'enableAjaxValidation' => true,
    'focus' => array($funcionario, 'nome')
        ));
?>
<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'nome'),
    $form->textField($funcionario, 'nome', array('maxlength' => 255)),
    $form->error($funcionario, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'username'),
    $form->textField($funcionario, 'username', array('maxlength' => 100)),
    $form->error($funcionario, 'username');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'password'),
    $form->passwordField($funcionario, 'password'),
    $form->error($funcionario, 'password');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'password2'),
    $form->passwordField($funcionario, 'password2'),
    $form->error($funcionario, 'password2');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'contribuinte'),
    $form->textField($funcionario, 'contribuinte', array('maxlength' => 9)),
    $form->error($funcionario, 'contribuinte');
    ?>
</div>

<div class="row">
    <?php echo $form->labelEx($funcionario, 'telefone'); ?>
    <?php echo $form->textField($funcionario, 'telefone', array('maxlength' => 9)); ?>
    <?php echo $form->error($funcionario, 'telefone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($funcionario, 'telemovel'); ?>
    <?php echo $form->textField($funcionario, 'telemovel', array('maxlength' => 9)); ?>
    <?php echo $form->error($funcionario, 'telemovel'); ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'valorHora'),
    $form->textField($funcionario, 'valorHora', array('maxlength' => 10)),
    $form->error($funcionario, 'valorHora');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($funcionario, 'Aumentar previlégios'),
    $form->checkBox($funcionario, 'admin'),
    $form->error($funcionario, 'admin');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($funcionario->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/funcionarios'));
    ?>
</div>

<?php
$this->endWidget();