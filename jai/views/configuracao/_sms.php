<div class="linha">
    <?php
    echo CHtml::label('Permitir SMSs', 'sms_enviar'),
    CHtml::dropDownList('sms_enviar', $config->sms_enviar, $nim);
    ?>
</div>
<div class="linha">
    <?php
    echo CHtml::label('Nr. Telemóvel', 'sms_telemovel'),
    CHtml::textField('sms_telemovel', $config->sms_telemovel);
    ?>
</div>
<div class="linha">
    <?php
    echo CHtml::label('Username', 'sms_utilizador'),
    CHtml::textField('sms_utilizador', $config->sms_utilizador);
    ?>
</div>
<div class="linha">
    <?php
    echo CHtml::label('Password', 'sms_password'),
    CHtml::textField('sms_password', $config->sms_password);
    ?>
</div>

<div class="linha">
    <?php
    $url = $this->createUrl('configuracoes/vercreditossms');

    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/actualizar.png'), 'javascript:;', array('onclick' => "actualizarCreditos('{$url}');"));
    ?>
    Créditos Disponíveis <span id = "creditosSMS"><?php echo $config->sms_creditos; ?></span> 
</div>