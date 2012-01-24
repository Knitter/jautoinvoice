<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'servico-form',
    'enableAjaxValidation' => true,
    'focus' => array($servico, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'nome'),
    $form->textField($servico, 'nome', array('size' => 60, 'maxlength' => 255)),
    $form->error($servico, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'preco'),
    $form->textField($servico, 'preco'), '&nbsp;&euro;',
    $form->error($servico, 'preco');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'idIVA'),
    $form->DropDownList($servico, 'idIVA', CHtml::listData($ivas, 'idIVA', 'descricao')),
    $form->error($servico, 'idIVA');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'descricao'),
    $form->textArea($servico, 'descricao', array('rows' => 5, 'cols' => 80)),
    $form->error($servico, 'descricao');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::submitButton($servico->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/servicos'));
    ?>
</div>

<?php
$this->endWidget();