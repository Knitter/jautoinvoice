<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'modelo-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($modelo);
?>

<p>
    <?php
    echo $form->labelEx($modelo, 'nome'),
    $form->textField($modelo, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($modelo, 'nome');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($modelo, 'idMarca'),
    $form->textField($modelo, 'idMarca', array('size' => 10, 'maxlength' => 10)),
    $form->error($modelo, 'idMarca');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($modelo->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();