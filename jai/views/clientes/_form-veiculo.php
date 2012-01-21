<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'veiculo-form',
    'enableAjaxValidation' => true,
        ));

echo $form->errorSummary($veiculo);
?>

<p>
    <?php
    echo $form->labelEx($veiculo, 'matricula');

    $this->widget('CMaskedTextField', array(
        'attribute' => 'matricula',
        'model' => $veiculo,
        'mask' => '**-**-**',
        'placeholder' => ' '
    ));

    $form->error($veiculo, 'matricula');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'dataRegisto');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'attribute' => 'dataRegisto',
        'model' => $veiculo
    ));

    echo $form->error($veiculo, 'dataRegisto');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idCategoria'),
    $form->dropDownList($veiculo, 'idCategoria', CHtml::listData($categorias, 'idCategoria', 'nome'), array('empty' => '- escolha -')),
    $form->error($veiculo, 'idCategoria');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idCombustivel'),
    $form->dropDownList($veiculo, 'idCombustivel', CHtml::listData($combustiveis, 'idCombustivel', 'nome'), array('empty' => '- escolha -')),
    $form->error($veiculo, 'idCombustivel');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($veiculo, 'idModelo'),
    $form->dropDownList($veiculo, 'idModelo', CHtml::listData($modelos, 'idModelo', 'nome', 'marca.nome'), array('empty' => '- escolha -')),
    $form->error($veiculo, 'idModelo');
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
    echo CHtml::submitButton($veiculo->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;';
    //CHtml::link('Cancelar', $this->createUrl(''));
    ?>
</p>

<?php
$this->endWidget();