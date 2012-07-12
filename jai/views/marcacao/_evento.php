<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'janelaEvento',
    'options' => array(
        'title' => 'Editar Marcação',
        'autoOpen' => false,
        'minWidth' => 560,
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

<div class="linha">
    <?php
    echo CHtml::label('Descricao', 'descricaoEvento'),
    CHtml::textField('descricaoEvento', null, array('class' => 'medium-field', 'maxlength' => 150));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Matrícula', 'matriculaEvento');
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'matriculaEvento',
        'sourceUrl' => $this->createUrl('marcacao/matricula'),
        'options' => array(
            'minLength' => '3'
        )
    ));
    ?>
</div>

<div class = "linha">
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

<div class="linha">
    <?php
    echo CHtml::label('Hora', 'horaEvento'),
    CHtml::textField('horaEvento', '', array('class' => 'horas small-field'));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Notas', 'notasEvento'),
    CHtml::textArea('notasEvento', null, array('rows' => 5, 'cols' => 39));
    ?>
</div>

<input type="hidden" name="idEvento" id="idEvento" />
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');