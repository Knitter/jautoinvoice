<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'combustivel-form',
    'enableAjaxValidation' => true,
    'focus' => array($combustivel, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($combustivel, 'nome'),
    $form->textField($combustivel, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($combustivel, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($combustivel->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/combustiveis'));
    ?>
</div>

<?php
$this->endWidget();