<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'modelo-form',
    'enableAjaxValidation' => true,
        ));

echo $form->errorSummary($modelo);
?>

<p>
    <?php
    echo $form->labelEx($modelo, 'nome'),
    $form->textField($modelo, 'nome', array('size' => 60, 'maxlength' => 100)),
    $form->error($modelo, 'nome');
    ?>
</p>

<p>
    <?php
    echo $form->labelEx($modelo, 'idMarca'),
    $form->dropDownList($modelo, 'idMarca', CHtml::listData($marcas, 'idMarca', 'nome'), array('empty' => '- escolha uma marca -'));
    $form->error($modelo, 'idMarca');
    ?>
</p>

<p>
    <?php
    echo CHtml::submitButton($modelo->isNewRecord ? 'Criar' : 'Gravar'), '&nbsp;&nbsp;&nbsp;',
    CHtml::link('Cancelar', $this->createUrl('/modelos'));
    ?>
</p>

    <?php
    $this->endWidget();