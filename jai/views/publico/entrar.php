<?php $this->titulo = 'Login'; ?>

<div class="span-12 prepend-6 append-6 form">
    <h2>Entrar no Sistema</h2>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => false
            ));
    ?>

    <div class="linha">
        <?php
        echo $form->labelEx($formulario, 'identificacao'),
        $form->textField($formulario, 'identificacao'),
        $form->error($formulario, 'identificacao');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($formulario, 'password'),
        $form->passwordField($formulario, 'password'),
        $form->error($formulario, 'password');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->checkBox($formulario, 'lembrarMe'),
        $form->label($formulario, 'lembrarMe'),
        $form->error($formulario, 'lembrarMe');
        ?>
    </div>
    <div class="linha">
        <?php echo CHtml::submitButton('Entrar'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>