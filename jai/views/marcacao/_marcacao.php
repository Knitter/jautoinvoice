<?php
$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->baseUrl . '/recursos/css/jquery.timepicker.min.css');
$cs->registerScriptFile(Yii::app()->baseUrl . '/recursos/js/jquery.timepicker.min.js');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'janelaMarcacao',
    'options' => array(
        'title' => 'Marcar ',
        'autoOpen' => false,
        'minWidth' => 560,
        'minHeight' => 270,
        'buttons' => array(
            array(
                'text' => 'Criar',
                'click' => 'js:marcar'
            ),
            array(
                'text' => 'Cancelar',
                'click' => 'js:function() { $(this).dialog("close"); }'
            )
        ),
        'close' => 'js:fecharJanelaMarcacao'
    )
));
?>
<div class="linha">
    <?php
    echo CHtml::label('Descricao', 'descricao'),
    CHtml::textField('descricao', null, array('class' => 'medium-field', 'maxlength' => 150));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Matrícula', 'matricula');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'matricula',
        'sourceUrl' => $this->createUrl('veiculo/matricula'),
        'options' => array(
            'minLength' => '3'
        )
    ));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Data', 'dataMarcacao');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'dataMarcacao',
        'htmlOptions' => array(
            'class' => 'datas'
        )
    ));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Hora', 'hora'),
    CHtml::textField('hora', '', array('class' => 'horas small-field'));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Notas', 'notas'),
    CHtml::textArea('notas', null, array('rows' => 5, 'cols' => 39));
    ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');