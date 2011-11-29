<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'material-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($material);
?>

<p>
    <?php
    echo $form->labelEx($material, 'precoUnitario'),
    $form->textField($material, 'precoUnitario', array('size' => 10, 'maxlength' => 10)),
    $form->error($material, 'precoUnitario');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($material, 'referencia'),
    $form->textField($material, 'referencia', array('size' => 25, 'maxlength' => 25)),
    $form->error($material, 'referencia');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($material, 'descricao'),
    $form->textArea($material, 'descricao', array('rows' => 6, 'cols' => 50)),
    $form->error($material, 'descricao');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($material, 'idFornecedor'),
    $form->textField($material, 'idFornecedor', array('size' => 10, 'maxlength' => 10)),
    $form->error($material, 'idFornecedor');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($material, 'idIVA'),
    $form->textField($material, 'idIVA', array('size' => 10, 'maxlength' => 10)),
    $form->error($material, 'idIVA');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($material->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();