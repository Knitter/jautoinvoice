<?php
Yii::app()->clientScript->registerCssFile('css/timepicker/jquery.timepicker.css');
Yii::app()->clientScript->registerScriptFile('js/timepicker/jquery.timepicker.js');

Yii::app()->clientScript->registerScript('initPicker', '$("#hora").timepicker({showPeriodLabels: false});');
?>

<p>
    <?php
    echo CHtml::label('Contribuinte', 'contribuinte');

    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'contribuinte',
        'sourceUrl' => $this->createUrl('marcacoes/accontribuinte'),
        'options' => array(
            'minLength' => '3',
        )
    ));

    echo Chtml::label('Matrícula', 'matricula');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'matricula',
        'sourceUrl' => $this->createUrl('marcacoes/acmatricula'),
        'options' => array(
            'minLength' => '3',
        )
    ));
    ?>
</p>

<p>
    Veículos
</p>

<p>
    <?php
    echo CHtml::label('Hora:', 'hora'),
    CHtml::textField('hora');
    ?>
</p>

<p>
    <?php
    echo CHtml::label('Descrição', 'descricao'),
    CHtml::textField('descricao', null, array('maxlenght' => 150));
    ?>
</p>

<?php echo CHtml::button('Criar', array('onclick' => 'marcar();')); ?>