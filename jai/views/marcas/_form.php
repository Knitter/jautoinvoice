<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'marca-form',
    'enableAjaxValidation' => true,
    'focus' => array($marca, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($marca, 'nome'),
    $form->textField($marca, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($marca, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($marca->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/marcas'));
    ?>
</p>

<?php
$this->endWidget();