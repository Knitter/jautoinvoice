<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'material-form',
    'enableAjaxValidation' => true,
    'focus' => array($material, 'nome')
        ));
?>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'nome'),
    $form->textField($material, 'nome', array('class' => 'medium-field', 'maxlength' => 150)),
    $form->error($material, 'nome');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'referencia'),
    $form->textField($material, 'referencia', array('class' => 'medium-field', 'maxlength' => 25)),
    $form->error($material, 'referencia');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'precoUnitario'),
    $form->textField($material, 'precoUnitario', array('class' => 'small-field', 'maxlength' => 15)), '&nbsp;&euro;',
    $form->error($material, 'precoUnitario');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'quantidadeStock'),
    $form->textField($material, 'quantidadeStock', array('class' => 'small-field', 'maxlength' => 10)),
    $form->error($material, 'quantidadeStock');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'idIva'),
    $form->dropDownList($material, 'idIva', CHtml::listData($ivas, 'idIva', 'descricao')),
    $form->error($material, 'idIva');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'descricao'),
    $form->textArea($material, 'descricao', array('rows' => 5, 'cols' => 76)),
    $form->error($material, 'descricao');
    ?>
</div>

<div class="linha">
    <?php
    echo $form->labelEx($material, 'fornecedores'),
    $form->listBox($material, 'fornecedores', CHtml::listData($fornecedores, 'idFornecedor', 'nome')
            , array('class' => 'medium-field', 'multiple' => 'multiple', 'empty' => '')),
    $form->error($material, 'fornecedores');
    ?>
</div>

<div class="linha accoes">
    <?php
    echo CHtml::submitButton('Gravar', array(
        'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
    )),
    CHtml::link('Cancelar', $this->createUrl('material/index'), array('class' => 'cancelar'));
    ?>
</div>

<?php
$this->endWidget();