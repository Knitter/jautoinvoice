<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'categoria-form',
    'enableAjaxValidation' => true,
    'focus' => array($categoria, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($categoria, 'nome'),
    $form->textField($categoria, 'nome', array('class' => 'medium-field', 'maxlength' => 100)),
    $form->error($categoria, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($categoria->isNewRecord ? 'Criar' : 'Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/categorias'));
    ?>
</div>

<?php
$this->endWidget();