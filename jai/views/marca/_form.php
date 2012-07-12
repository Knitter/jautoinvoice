<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'marca-form',
    'enableAjaxValidation' => true,
    'focus' => array($marca, 'nome')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($marca, 'nome'),
        $form->textField($marca, 'nome', array('class' => 'medium-field', 'maxlength' => 100)),
        $form->error($marca, 'nome');
        ?>
    </div>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('marca/index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();