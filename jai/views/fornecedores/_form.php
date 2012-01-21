<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'fornecedor-form',
    'enableAjaxValidation' => false,
        ));
echo $form->errorSummary($fornecedor);
?>

<p>
    <?php
    echo $form->labelEx($fornecedor, 'nome'),
    $form->textField($fornecedor, 'nome', array('maxlength' => 255)),
    $form->error($fornecedor, 'nome');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($fornecedor, 'email'),
    $form->textField($fornecedor, 'email', array('maxlength' => 255)),
    $form->error($fornecedor, 'email');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($fornecedor, 'telefone'),
    $form->textField($fornecedor, 'telefone', array('maxlength' => 9)),
    $form->error($fornecedor, 'telefone');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($fornecedor, 'telemovel'),
    $form->textField($fornecedor, 'telemovel', array('maxlength' => 9)),
    $form->error($fornecedor, 'telemove');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($fornecedor, 'website'),
    $form->textField($fornecedor, 'website', array('maxlength' => 255)),
    $form->error($fornecedor, 'website');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($fornecedor, 'morada'),
    $form->textField($fornecedor, 'morada', array('maxlength' => 255)),
    $form->error($fornecedor, 'morada');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($fornecedor, 'notas'),
    $form->textArea($fornecedor, 'notas'),
    $form->error($fornecedor, 'notas');
    ?>
</p>


<p>
    <?php
    echo CHtml::submitButton($fornecedor->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('fornecedores/index'));
    ?>
</p>

<?php
$this->endWidget();