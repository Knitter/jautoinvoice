<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'cliente-form',
    'enableAjaxValidation' => true,
    'focus' => array($cliente, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($cliente, 'nome'),
    $form->textField($cliente, 'nome', array('maxlength' => 255)),
    $form->error($cliente, 'nome');
    ?>
</div>

<div class="row">
    <?php echo $form->labelEx($cliente, 'email'); ?>
    <?php echo $form->textField($cliente, 'email', array('maxlength' => 255)); ?>
    <?php echo $form->error($cliente, 'email'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($cliente, 'contribuinte'); ?>
    <?php echo $form->textField($cliente, 'contribuinte', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'contribuinte'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($cliente, 'telefone'); ?>
    <?php echo $form->textField($cliente, 'telefone', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'telefone'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($cliente, 'telemovel'); ?>
    <?php echo $form->textField($cliente, 'telemovel', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'telemovel'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($cliente, 'morada'); ?>
    <?php echo $form->textField($cliente, 'morada', array('maxlength' => 255)); ?>
    <?php echo $form->error($cliente, 'morada'); ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($cliente->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('clientes/index'));
    ?>
</div>

<?php
$this->endWidget();