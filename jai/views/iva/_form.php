<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'iva-form',
    'enableAjaxValidation' => true,
    'focus' => array($iva, 'descricao')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($iva, 'descricao'),
    $form->textField($iva, 'descricao', array('size' => 60, 'maxlength' => 255)),
    $form->error($iva, 'descricao');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($iva, 'percentagem'),
    $form->textField($iva, 'percentagem'),
    $form->error($iva, 'percentagem');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($iva->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/iva'));
    ?>
</div>

<?php
$this->endWidget();