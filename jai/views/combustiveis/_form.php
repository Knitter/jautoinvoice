<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'combustivel-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($combustivel);
?>

<p>
    <?php
    echo $form->labelEx($combustivel, 'nome'),
    $form->textField($combustivel, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($combustivel, 'nome');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($combustivel->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/combustiveis'));
    ?>
</p>

<?php
$this->endWidget();