<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'combustivel-form',
    'enableAjaxValidation' => true,
    'focus' => array($combustivel, 'nome')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($combustivel, 'nome'),
        $form->textField($combustivel, 'nome', array('class' => 'medium-field', 'maxlength' => 100)),
        $form->error($combustivel, 'nome');
        ?>
    </div>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('combustivel/index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();