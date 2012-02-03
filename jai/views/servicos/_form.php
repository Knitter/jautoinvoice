<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'servico-form',
    'enableAjaxValidation' => true,
    'focus' => array($servico, 'nome')
        ));
?>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'nome'),
    $form->textField($servico, 'nome', array('class' => 'long-field', 'maxlength' => 255)),
    $form->error($servico, 'nome');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'preco'),
    $form->textField($servico, 'preco', array('class' => 'small-field')), '&nbsp;&euro;',
    $form->error($servico, 'preco');
    ?>
</div>

<div class="row">
    <?php
    echo $form->labelEx($servico, 'idIVA'),
    $form->DropDownList($servico, 'idIVA', CHtml::listData($ivas, 'idIVA', 'descricao'), array('empty' => 'Sem IVA')),
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
    echo CHtml::submitButton($servico->isNewRecord ? 'Criar' : 'Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/servicos'));
    ?>
</div>

<?php
$this->endWidget();