<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'modelo-form',
    'enableAjaxValidation' => true,
    'focus' => array($modelo, 'nome')
        ));
?>

<div class="linha">
    <?php
    echo $form->labelEx($modelo, 'nome'),
    $form->textField($modelo, 'nome', array('class' => 'medium-field', 'maxlength' => 100)),
    $form->error($modelo, 'nome');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($modelo, 'idMarca'),
    $form->dropDownList($modelo, 'idMarca', CHtml::listData($marcas, 'idMarca', 'nome')
            , array('empty' => '- escolha uma marca -')),
    $form->error($modelo, 'idMarca');
    ?>
</div>

<div class="linha accoes">
    <?php
    echo CHtml::submitButton('Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    CHtml::link('Cancelar', $this->createUrl('modelo/index'), array('class' => 'cancelar'));
    ?>
</div>

<?php
$this->endWidget();