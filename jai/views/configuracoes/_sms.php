<?php Yii::app()->clientScript->registerScriptFile('js/jai/default.js'); ?>

<h3>Envio SMSs</h3>
<div class="configuracoes">
    <div class="row">
        <?php
        echo CHtml::label('Permitir o envio de mensagens por SMS', 'enviarSMS'),
        CHtml::dropDownList('enviarSMS', $config->enviarSMS, $nim);
        ?>
    </div>
    <hr />
    <div class="row">
        <?php
        echo CHtml::label('Username', 'utilizadorLSMS'),
        CHtml::textField('utilizadorLSMS', $config->utilizadorLSMS);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label('Password', 'passwordLSMS'),
        CHtml::textField('passwordLSMS', $config->passwordLSMS);
        ?>
    </div>
    <div class="row">
        Nr. Créditos Disponíveis <span id="creditosSMS"><?php echo $config->creditosLSMS; ?></span> 
        <a href="javascript:actualizarCreditos('<?php echo $this->createUrl('configuracoes/vercreditossms'); ?>');"><img src="imagens/icones/x16.geral.actualizar" /></a>
    </div>
</div>