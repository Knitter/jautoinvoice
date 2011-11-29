<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'categoria-form',
    'enableAjaxValidation' => true,
        ));
?>

<?php echo $form->errorSummary($categoria); ?>

<p>
    <?php
    echo $form->labelEx($categoria, 'nome'),
    $form->textField($categoria, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($categoria, 'nome');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($categoria->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();