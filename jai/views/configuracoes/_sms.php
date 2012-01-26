<?php Yii::app()->clientScript->registerScriptFile('js/jai/default.js'); ?>

<h3>Sistema de SMSs</h3>
<div class="configuracoes">
    <fieldset>
        <legend>Luso SMS</legend>
        <div class="row">
            <?php
            echo CHtml::label('Permitir SMSs', 'enviarSMS'),
            CHtml::dropDownList('enviarSMS', $config->enviarSMS, $nim);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Nr. Telemóvel', 'telemovelLSMS'),
            CHtml::textField('telemovelLSMS', $config->telemovelLSMS);
            ?>
        </div>
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
    </fieldset>
    <div class="row">
        Nr. Créditos Disponíveis <span id="creditosSMS"><?php echo $config->creditosLSMS; ?></span> 
        <a href="javascript:actualizarCreditos('<?php echo $this->createUrl('configuracoes/vercreditossms'); ?>');"><img src="imagens/icones/x16.geral.actualizar" /></a>
    </div>
</div>