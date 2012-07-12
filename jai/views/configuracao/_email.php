<div class="linha">
    <?php
    echo CHtml::label('Permitir E-mails', 'email_enviar'),
    CHtml::dropDownList('email_enviar', $config->email_enviar, $nim);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('E-mail de Envio', 'email_endereco'),
    CHtml::textField('email_endereco', $config->email_endereco, array('class' => 'medium-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Enviar em HTML', 'email_html'),
    CHtml::checkBox('email_html', $config->email_html);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Usar SMTP', 'email_smtp_usar'),
    CHtml::dropDownList('email_smtp_usar', $config->email_smtp_usar, $nim);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Username', 'email_smtp_utilizador'),
    CHtml::textField('email_smtp_utilizador', $config->email_smtp_utilizador);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Password', 'email_smtp_password'),
    CHtml::textField('email_smtp_password', $config->email_smtp_password);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Servidor', 'email_smtp_servidor'),
    CHtml::textField('email_smtp_servidor', $config->email_smtp_servidor, array('class' => 'medium-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Porto', 'email.smtp.porto'),
    CHtml::textField('email_smtp_porto', $config->email_smtp_porto, array('class' => 'small-field', 'maxlength' => 15));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Prefixo', 'email_smtp_prefixo'),
    CHtml::dropDownList('email_smtp_prefixo', $config->email_smtp_prefixo, array('ssl' => 'SSL', 'tls' => 'TLS'));
    ?>
</div>