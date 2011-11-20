<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'funcionario-form',
    'enableAjaxValidation' => true,
        ));

echo $form->errorSummary($funcionario);
?>
<p>
    <?php
    echo $form->labelEx($funcionario, 'nome'),
    $form->textField($funcionario, 'nome', array('maxlength' => 255)),
    $form->error($funcionario, 'nome');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($funcionario, 'username'),
    $form->textField($funcionario, 'username', array('maxlength' => 100)),
    $form->error($funcionario, 'username');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($funcionario, 'password'),
    $form->textField($funcionario, 'password'),
    $form->error($funcionario, 'password');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($funcionario, 'password2'),
    $form->textField($funcionario, 'password2'),
    $form->error($funcionario, 'password2');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($funcionario, 'contribuinte'),
    $form->textField($funcionario, 'contribuinte', array('maxlength' => 9)),
    $form->error($funcionario, 'contribuinte');
    ?>
</p>
<p>
    <?php
    echo $form->labelEx($funcionario, 'valorHora'),
    $form->textField($funcionario, 'valorHora', array('maxlength' => 10)),
    $form->error($funcionario, 'valorHora');
    ?>
</p>

<p>
    <?php echo CHtml::submitButton($funcionario->isNewRecord ? 'Criar' : 'Gravar'); ?>
</p>


<?php
$this->endWidget();