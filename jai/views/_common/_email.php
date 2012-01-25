<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'emailForm',
    'options' => array(
        'title' => 'Enviar e-mail',
        'autoOpen' => false,
        'minWidth' => 560,
        'buttons' => array(
            array(
                'text' => 'Enviar',
                'click' => "js:function() { enviarEmail('{$this->createUrl('clientes/email')}') }"
            ),
            array(
                'text' => 'Cancelar',
                'click' => 'js:function() { $(this).dialog("close"); }'
            )
        ),
        'close' => 'js:fecharCaixaEmail'
    ),
));
?>
<div class="row">
    <?php
    echo CHtml::label('Assunto', 'assunto'), CHtml::textField('assunto', null, array('maxlength' => 200));
    ?>
</div>

<div class="row">
    <?php
    echo CHtml::label('Mensagem', 'mensagem'), CHtml::textArea('mensagem', null, array('rows' => 5, 'cols' => 50));
    ?>
</div>

<?php
echo CHtml::hiddenField('idClienteEmail');

$this->endWidget('zii.widgets.jui.CJuiDialog');