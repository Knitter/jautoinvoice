<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'categoria-form',
    'enableAjaxValidation' => true,
    'focus' => array($categoria, 'nome')
        ));
?>

<div class="linha">
    <?php
    echo $form->labelEx($categoria, 'nome'),
    $form->textField($categoria, 'nome', array('class' => 'medium-field', 'maxlength' => 100)),
    $form->error($categoria, 'nome');
    ?>
</div>

<div class="linha accoes">
    <?php
    echo CHtml::submitButton('Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    CHtml::link('Cancelar', $this->createUrl('/categoria'), array('class' => 'cancelar'));
    ?>
</div>

<?php
$this->endWidget();