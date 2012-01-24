<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'material-form',
    'enableAjaxValidation' => true,
    'focus' => array($material, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($material, 'referencia'),
    $form->textField($material, 'referencia', array('size' => 25, 'maxlength' => 25)),
    $form->error($material, 'referencia');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($material, 'precoUnitario'),
    $form->textField($material, 'precoUnitario', array('size' => 10, 'maxlength' => 10)), '&nbsp;&euro;',
    $form->error($material, 'precoUnitario');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($material, 'idFornecedor'),
    $form->textField($material, 'idFornecedor', array('size' => 10, 'maxlength' => 10)),
    $form->error($material, 'idFornecedor');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($material, 'idIVA'),
    $form->dropDownList($material, 'idIVA', CHtml::listData($ivas, 'idIVA', 'descricao')),
    $form->error($material, 'idIVA');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($material, 'descricao'),
    $form->textArea($material, 'descricao', array('rows' => 5, 'cols' => 80)),
    $form->error($material, 'descricao');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($material->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/stock'));
    ?>
</div>

<?php
$this->endWidget();