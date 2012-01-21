<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'servico-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($servico);
?>

<p>
    <?php
    echo $form->labelEx($servico, 'nome'),
    $form->textField($servico, 'nome', array('size' => 60, 'maxlength' => 255)),
    $form->error($servico, 'nome');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($servico, 'descricao'),
    $form->textArea($servico, 'descricao', array('rows' => 6, 'cols' => 50)),
    $form->error($servico, 'descricao');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($servico->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/servicos'));
    ?>
</p>

<?php
$this->endWidget();