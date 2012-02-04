<h3>Configurações de E-mail</h3>
<div class="configuracoes">
    <fieldset>
        <legend>Geral</legend>
        <div class="row">
            <?php
            echo CHtml::label('Permitir E-mails', 'enviarEmails'),
            CHtml::dropDownList('enviarEmails', $config->enviarEmails, $nim);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('E-mail de Envio', 'enderecoEmail'),
            CHtml::textField('enderecoEnvio', $config->enderecoEnvio, array('class' => 'medium-field', 'maxlength' => 255));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Enviar em HTML', 'htmlEmails'),
            CHtml::checkBox('htmlEmails', $config->htmlEmails);
            ?>
        </div>
    </fieldset>
    <br />
    <fieldset>
        <legend>SMTP</legend>
        <div class="row">
            <?php
            echo CHtml::label('Usar SMTP', 'usarSMTP'),
            CHtml::dropDownList('usarSMTP', $config->usarSMTP, $nim);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Username', 'utilizadorSMTP'),
            CHtml::textField('utilizadorSMTP', $config->utilizadorSMTP);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Password', 'passwordSMTP'),
            CHtml::textField('passwordSMTP', $config->passwordSMTP);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Servidor', 'servidorSMTP'),
            CHtml::textField('servidorSMTP', $config->servidorSMTP, array('class' => 'medium-field', 'maxlength' => 255));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Porto', 'portoSMTP'),
            CHtml::textField('portoSMTP', $config->portoSMTP, array('class' => 'small-field', 'maxlength' => 15));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Prefixo', 'prefixoSMTP'),
            CHtml::dropDownList('prefixoSMTP', $config->prefixoSMTP, array('ssl' => 'SSL', 'tls' => 'TLS'));
            ?>
        </div>
    </fieldset>
</div>
