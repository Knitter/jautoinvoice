<?php
Yii::app()->clientScript->registerCssFile('assets/css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'cliente-form',
    'enableAjaxValidation' => true,
        ));

echo $form->errorSummary($cliente);
?>

<p>
    <?php
    echo $form->labelEx($cliente, 'nome'),
    $form->textField($cliente, 'nome', array('maxlength' => 255)),
    $form->error($cliente, 'nome');
    ?>
</p>

<p>
    <?php echo $form->labelEx($cliente, 'email'); ?>
    <?php echo $form->textField($cliente, 'email', array('maxlength' => 255)); ?>
    <?php echo $form->error($cliente, 'email'); ?>
</p>

<p>
    <?php echo $form->labelEx($cliente, 'contribuinte'); ?>
    <?php echo $form->textField($cliente, 'contribuinte', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'contribuinte'); ?>
</p>

<p>
    <?php echo $form->labelEx($cliente, 'telefone'); ?>
    <?php echo $form->textField($cliente, 'telefone', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'telefone'); ?>
</p>

<p>
    <?php echo $form->labelEx($cliente, 'telemovel'); ?>
    <?php echo $form->textField($cliente, 'telemovel', array('maxlength' => 9)); ?>
    <?php echo $form->error($cliente, 'telemovel'); ?>
</p>
<p>
    <?php echo $form->labelEx($cliente, 'morada'); ?>
    <?php echo $form->textField($cliente, 'morada', array('maxlength' => 255)); ?>
    <?php echo $form->error($cliente, 'morada'); ?>
</p>
<p>
    <?php
    echo CHtml::submitButton($cliente->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('clientes/index'));
    ?>
</p>

<?php
$this->endWidget();