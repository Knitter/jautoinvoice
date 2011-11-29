<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'folha-obra-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($folhaObra);
?>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'data'),
    $form->textField($folhaObra, 'data'),
    $form->error($folhaObra, 'data');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'descricaoAvaria'),
    $form->textArea($folhaObra, 'descricaoAvaria', array('rows' => 6, 'cols' => 50)),
    $form->error($folhaObra, 'descricaoAvaria');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'kms'),
    $form->textField($folhaObra, 'kms'),
    $form->error($folhaObra, 'kms');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'activo'),
    $form->textField($folhaObra, 'activo'),
    $form->error($folhaObra, 'activo');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'idVeiculo'),
    $form->textField($folhaObra, 'idVeiculo', array('size' => 10, 'maxlength' => 10)),
    $form->error($folhaObra, 'idVeiculo');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($folhaObra, 'idFuncionario'),
    $form->textField($folhaObra, 'idFuncionario', array('size' => 10, 'maxlength' => 10)),
    $form->error($folhaObra, 'idFuncionario');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($folhaObra->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();