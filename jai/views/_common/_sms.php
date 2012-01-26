<?php
Yii::app()->clientScript->registerCssFile('css/formularios.css');

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'smsForm',
    'options' => array(
        'title' => 'Enviar SMS',
        'autoOpen' => false,
        'minWidth' => 560,
        'buttons' => array(
            array(
                'text' => 'Enviar',
                'click' => "js:function() { enviarSMS('{$this->createUrl('clientes/sms')}') }"
            ),
            array(
                'text' => 'Cancelar',
                'click' => 'js:function() { $(this).dialog("close"); }'
            )
        ),
        'close' => 'js:fecharCaixaSMS'
    ),
));
?>
<div class="row">
    <?php
    echo CHtml::label('Mensagem', 'sms'), CHtml::textField('sms', null, array('maxlength' => '150'));
    ?>
</div>

<span class="info">Limite de 150 caracteres.</p>
<?php
echo CHtml::hiddenField('idClienteSms');

$this->endWidget('zii.widgets.jui.CJuiDialog');