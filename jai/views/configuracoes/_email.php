<h3>E-mail</h3>
<div class="configuracoes">
    <div class="row">
        <?php
        echo CHtml::label('Permitir o envio de mensagens de E-mail', 'enviarEmails'),
        CHtml::dropDownList('enviarEmails', $config->enviarEmails, $nim);
        ?>
    </div>
    <hr />
    <div class="row">
        <?php
        echo CHtml::label('Endereço de Origem', 'enderecoEmail'),
        CHtml::textField('enderecoEmail', $config->enderecoEmail);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label('Enviar em HTML', 'htmlEmails'),
        CHtml::checkBox('htmlEmails', $config->htmlEmails);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label('Usar SMTP', 'usarSMTP'),
        CHtml::dropDownList('usarSMTP', $config->usarSMTP, $nim);
        ?>
    </div>
    <fieldset>
        <legend>SMTP</legend>
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
            CHtml::textField('servidorSMTP', $config->servidorSMTP);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Porto', 'portoSMTP'),
            CHtml::textField('portoSMTP', $config->portoSMTP);
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
