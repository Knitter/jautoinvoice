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
        <?php
        $url = $this->createUrl('configuracoes/vercreditossms');

        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/actualizar.png'), 'javascript:;', array('onclick' => "actualizarCreditos('{$url}');"));
        ?>
        Nr. Créditos Disponíveis <span id = "creditosSMS"><?php echo $config->creditosLSMS; ?></span> 
    </div>
</div>