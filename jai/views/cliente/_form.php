<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'cliente-form',
    'enableAjaxValidation' => true,
    'focus' => array($cliente, 'nome')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($cliente, 'nome'),
        $form->textField($cliente, 'nome', array('class' => 'medium-field', 'maxlength' => 255)),
        $form->error($cliente, 'nome');
        ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($cliente, 'email'); ?>
        <?php echo $form->textField($cliente, 'email', array('class' => 'medium-field', 'maxlength' => 255)); ?>
        <?php echo $form->error($cliente, 'email'); ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($cliente, 'contribuinte'); ?>
        <?php echo $form->textField($cliente, 'contribuinte', array('maxlength' => 9)); ?>
        <?php echo $form->error($cliente, 'contribuinte'); ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($cliente, 'telefone'); ?>
        <?php echo $form->textField($cliente, 'telefone', array('maxlength' => 9)); ?>
        <?php echo $form->error($cliente, 'telefone'); ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($cliente, 'telemovel'); ?>
        <?php echo $form->textField($cliente, 'telemovel', array('maxlength' => 9)); ?>
        <?php echo $form->error($cliente, 'telemovel'); ?>
    </div>

    <div class="linha">
        <?php echo $form->labelEx($cliente, 'morada'); ?>
        <?php echo $form->textField($cliente, 'morada', array('class' => 'long-field', 'maxlength' => 255)); ?>
        <?php echo $form->error($cliente, 'morada'); ?>
    </div>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('cliente/index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();