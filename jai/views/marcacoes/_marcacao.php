<?php
Yii::app()->clientScript->registerCssFile('css/timepicker/jquery.timepicker.css');
Yii::app()->clientScript->registerScriptFile('js/timepicker/jquery.timepicker.js');

Yii::app()->clientScript->registerCssFile('css/formularios.css');

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
<div class="row">
    <?php
    echo CHtml::label('Descricao', 'descricao', array('maxlength' => 150)),
    CHtml::textField('descricao');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Matrícula', 'matricula');
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
    echo CHtml::label('Data', 'dataMarcacao');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'dataMarcacao',
        'htmlOptions' => array(
            'class' => 'datas'
        )
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Hora', 'hora'),
    CHtml::textField('hora', '', array('class' => 'horas'));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Notas', 'notas'),
    CHtml::textArea('notas', null, array('rows' => 5, 'cols' => 50));
    ?>
</div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');