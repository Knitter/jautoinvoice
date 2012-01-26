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
    $form->textField($iva, 'descricao', array('class' => 'medium-field', 'maxlength' => 255)),
    $form->error($iva, 'descricao');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($iva, 'percentagem'),
    $form->textField($iva, 'percentagem', array('class' => 'small-field')),
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