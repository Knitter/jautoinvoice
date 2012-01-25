<?php
Yii::app()->clientScript->registerCssFile('css/timepicker/jquery.timepicker.css');
Yii::app()->clientScript->registerScriptFile('js/timepicker/jquery.timepicker.js');

Yii::app()->clientScript->registerScript('timeInit', 'initTimePicker();');

Yii::app()->clientScript->registerCssFile('css/formularios.css');
?>
<div class="row">
    <?php
    echo Chtml::label('Matrícula', 'matricula');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'matricula',
        'sourceUrl' => $this->createUrl('marcacoes/acmatricula'),
        'options' => array(
            'minLength' => '3'
        )
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Data', 'data');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'data'
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Hora', 'hora'),
    CHtml::textField('hora');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Descricao', 'descricao', array('maxlength' => 150)),
    CHtml::textField('descricao');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Notas', 'notas'),
    CHtml::textArea('notas', null, array('rows' => 5, 'cols' => 50));
    ?>
</div>