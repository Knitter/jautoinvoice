<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'iva-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($iva);
?>

<p>
    <?php
    echo $form->labelEx($iva, 'descricao'),
    $form->textField($iva, 'descricao', array('size' => 60, 'maxlength' => 255)),
    $form->error($iva, 'descricao');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($iva, 'percentagem'),
    $form->textField($iva, 'percentagem'),
    $form->error($iva, 'percentagem');
    ?>
</p>


<p>
    <?php
    echo CHtml::submitButton($iva->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();