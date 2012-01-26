<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'janelaEvento',
    'options' => array(
        'title' => 'Editar Marcação',
        'autoOpen' => false,
        'minWidth' => 560,
        //'minHeight' => 270,
        'buttons' => array(
            array(
                'text' => 'Guardar',
                'click' => 'js:guardar'
            ),
            array(
                'text' => 'Folha Obra',
                'click' => 'js:folhaObra'
            ),
            array(
                'text' => 'Apagar',
                'click' => 'js:apagar'
            ),
            array(
                'text' => 'Cancelar',
                'click' => 'js:function() { $(this).dialog("close"); }'
            )
        ),
        'close' => 'js:fecharJanelaEvento'
    )
));
?>

<div class="row">
    <?php
    echo CHtml::label('Descricao', 'descricaoEvento', array('maxlength' => 150)),
    CHtml::textField('descricaoEvento');
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Matrícula', 'matriculaEvento');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'matriculaEvento',
        'sourceUrl' => $this->createUrl('marcacoes/acmatricula'),
        'options' => array(
            'minLength' => '3'
        )
    ));
    ?>
</div>

<div class = "row">
    <?php
    echo CHtml::label('Data', 'dataEvento');

    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'dataEvento',
        'htmlOptions' => array(
            'class' => 'datas'
        )
    ));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Hora', 'horaEvento'),
    CHtml::textField('horaEvento', '', array('class' => 'horas'));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Notas', 'notasEvento'),
    CHtml::textArea('notasEvento', null, array('rows' => 5, 'cols' => 50));
    ?>
</div>

<input type="hidden" name="idEvento" id="idEvento" />
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');