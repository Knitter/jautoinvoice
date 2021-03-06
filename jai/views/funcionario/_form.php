<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'funcionario-form',
    'enableAjaxValidation' => true,
    'focus' => array($funcionario, 'nome')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'nome'),
        $form->textField($funcionario, 'nome', array('class' => 'medium-field', 'maxlength' => 255)),
        $form->error($funcionario, 'nome');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'username'),
        $form->textField($funcionario, 'username', array('maxlength' => 100)),
        $form->error($funcionario, 'username');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'password'),
        $form->passwordField($funcionario, 'password'),
        $form->error($funcionario, 'password');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'password2'),
        $form->passwordField($funcionario, 'password2'),
        $form->error($funcionario, 'password2');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'contribuinte'),
        $form->textField($funcionario, 'contribuinte', array('maxlength' => 9)),
        $form->error($funcionario, 'contribuinte');
        ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($funcionario, 'telefone'); ?>
        <?php echo $form->textField($funcionario, 'telefone', array('maxlength' => 9)); ?>
        <?php echo $form->error($funcionario, 'telefone'); ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($funcionario, 'telemovel'); ?>
        <?php echo $form->textField($funcionario, 'telemovel', array('maxlength' => 9)); ?>
        <?php echo $form->error($funcionario, 'telemovel'); ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($funcionario, 'valorHora'),
        $form->textField($funcionario, 'valorHora', array('class' => 'small-field', 'maxlength' => 10)), '&nbsp;&euro;',
        $form->error($funcionario, 'valorHora');
        ?>
    </div>

    <div class="linha">
        <?php
        echo CHtml::label('Aumentar previlégios', 'Funcionario_admin'),
        $form->checkBox($funcionario, 'admin'),
        $form->error($funcionario, 'admin');
        ?>
    </div>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('funcionario//index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();