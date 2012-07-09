<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'iva-form',
    'enableAjaxValidation' => true,
    'focus' => array($iva, 'descricao')
        ));
?>

<div class="linha">
    <?php
    echo $form->labelEx($iva, 'descricao'),
    $form->textField($iva, 'descricao', array('class' => 'medium-field', 'maxlength' => 255)),
    $form->error($iva, 'descricao');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($iva, 'percentagem'),
    $form->textField($iva, 'percentagem', array('class' => 'small-field')),
    $form->error($iva, 'percentagem');
    ?>
</div>

<div class="linha accoes">
    <?php
    echo CHtml::submitButton('Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    CHtml::link('Cancelar', $this->createUrl('iva/index'), array('class' => 'cancelar'));
    ?>
</div>

<?php
$this->endWidget();