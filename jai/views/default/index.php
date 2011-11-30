<?php
$this->title = 'jAutoInvoice :: Entrada';

Yii::app()->clientScript->registerCssFile('assets/css/formularios.css');
?>

<div class="span-12 prepend-6 append-6">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => false
            ));
    ?>

    <p>
        <?php
        echo $form->labelEx($formulario, 'identificacao'),
        $form->textField($formulario, 'identificacao'),
        $form->error($formulario, 'identificacao');
        ?>
    </p>

    <p>
        <?php
        echo $form->labelEx($formulario, 'password'),
        $form->passwordField($formulario, 'password'),
        $form->error($formulario, 'password');
        ?>
    </p>
    <p>
        <?php
        echo $form->checkBox($formulario, 'lembrarMe'),
        $form->label($formulario, 'lembrarMe'),
        $form->error($formulario, 'lembrarMe');
        ?>
    </p>
    <p>
        <?php echo CHtml::submitButton('Entrar'); ?>
    </p>
    <?php $this->endWidget(); ?>
</div>
