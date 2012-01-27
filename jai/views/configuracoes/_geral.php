<h3>Configurações Gerais</h3>
<div class="configuracoes">
    <fieldset>
        <legend>Sistema jAutoInvoice</legend>
        <div class="row">
            <?php
            echo CHtml::label('Sistema activo', 'sistemaActivo'),
            CHtml::dropDownList('sistemaActivo', $config->sistemaActivo, $nim);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Enviar notificações', 'enviarNotificacoes'),
            CHtml::dropDownList('enviarNotificacoes', $config->enviarNotificacoes, array(
                'nao' => 'Não',
                'email' => 'Apenas E-mail',
                'sms' => 'Apenas SMS',
                'emailsms' => 'E-mail ou SMS',
                'smsemail' => 'SMS ou E-mail'
            ));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Acesso de clientes', 'permitirClientes'),
            CHtml::dropDownList('permitirClientes', $config->permitirClientes, $nim);
            ?>
        </div>
    </fieldset>
    <br />
    <fieldset>
        <legend>Empresa</legend>
        <div class="row">
            <?php
            echo CHtml::label('Nome', 'nome'),
            CHtml::textField('nome', $config->nome, array('class' => 'medium-field', 'maxlength' => 255));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Endereço', 'endereco'),
            CHtml::textField('endereco', $config->endereco, array('class' => 'long-field', 'maxlength' => 255));
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Telefone', 'telefone'),
            CHtml::textField('telefone', $config->telefone);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Telemóvel', 'telemovel'),
            CHtml::textField('telemovel', $config->telemovel);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Fax', 'fax'),
            CHtml::textField('fax', $config->fax);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Horário', 'inicioActividade'),
            CHtml::textField('inicioActividade', $config->inicioActividade, array('class' => 'small-field')),
            ' ás ',
            CHtml::textField('fimActividade', $config->fimActividade, array('class' => 'small-field'));
            ?>
        </div>
    </fieldset>
    <br />
    <fieldset>
        <legend>Página de Contactos</legend>
        <div class="row">
            <?php
            echo CHtml::label('Mostrar página', 'mostrarPContacto'),
            CHtml::checkBox('mostrarPContacto', $config->mostrarPContacto);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Coordenadas (Lat/Lon)', 'latitude'),
            CHtml::textField('latitude', $config->latitude),
            ' : ',
            CHtml::textField('longitude', $config->longitude);
            ?>
        </div>
        <div class="row">
            <?php
            echo CHtml::label('Chave Google Maps', 'gmapskey'),
            CHtml::textField('gmapskey', $config->gmapskey, array('class' => 'medium-field'));
            ?>
        </div>
    </fieldset>
</div>
