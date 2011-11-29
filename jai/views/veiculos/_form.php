<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'veiculo-form',
    'enableAjaxValidation' => false,
        ));

echo $form->errorSummary($veiculo);
?>

<p>
    <?php
    echo $form->labelEx($veiculo, 'dataRegisto'),
    $form->textField($veiculo, 'dataRegisto'),
    $form->error($veiculo, 'dataRegisto');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'matricula'),
    $form->textField($veiculo, 'matricula', array('size' => 12, 'maxlength' => 12)),
    $form->error($veiculo, 'matricula');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'nrChassis'),
    $form->textField($veiculo, 'nrChassis', array('size' => 25, 'maxlength' => 25)),
    $form->error($veiculo, 'nrChassis');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'cilindrada'),
    $form->textField($veiculo, 'cilindrada', array('size' => 25, 'maxlength' => 25)),
    $form->error($veiculo, 'cilindrada');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'nrMotor'),
    $form->textField($veiculo, 'nrMotor', array('size' => 25, 'maxlength' => 25)),
    $form->error($veiculo, 'nrMotor');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'notas'),
    $form->textArea($veiculo, 'notas', array('rows' => 6, 'cols' => 50)),
    $form->error($veiculo, 'notas');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idCliente'),
    $form->textField($veiculo, 'idCliente', array('size' => 10, 'maxlength' => 10)),
    $form->error($veiculo, 'idCliente');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idCategoria'),
    $form->textField($veiculo, 'idCategoria', array('size' => 10, 'maxlength' => 10)),
    $form->error($veiculo, 'idCategoria');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idCombustivel'),
    $form->textField($veiculo, 'idCombustivel', array('size' => 10, 'maxlength' => 10)),
    $form->error($veiculo, 'idCombustivel');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idModelo'),
    $form->textField($veiculo, 'idModelo', array('size' => 10, 'maxlength' => 10)),
    $form->error($veiculo, 'idModelo');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($veiculo->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();