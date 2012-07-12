<h3>Sistema jAutoInvoice</h3>
<div class="linha">
    <?php
    echo CHtml::label('Sistema activo', 'geral_sistema_activo'),
    CHtml::dropDownList('geral_sistema_activo', $config->geral_sistema_activo, $nim);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Enviar notificações', 'geral_sistema_notificacoes'),
    CHtml::dropDownList('geral_sistema_notificacoes', $config->geral_sistema_notificacoes, $notificacoes);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Acesso de clientes', 'geral_sistema_clientes'),
    CHtml::dropDownList('geral_sistema_clientes', $config->geral_sistema_clientes, $nim);
    ?>
</div>

<h3>Empresa</h3>
<div class="linha">
    <?php
    echo CHtml::label('Nome', 'geral_empresa_nome'),
    CHtml::textField('geral_empresa_nome', $config->geral_empresa_nome, array('class' => 'medium-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Endereço', 'geral_empresa_endereco'),
    CHtml::textField('geral_empresa_endereco', $config->geral_empresa_endereco, array('class' => 'long-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Telefone', 'geral_empresa_telefone'),
    CHtml::textField('geral_empresa_telefone', $config->geral_empresa_telefone);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Telemóvel', 'geral_empresa_telemovel'),
    CHtml::textField('geral_empresa_telemovel', $config->geral_empresa_telemovel);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Fax', 'geral_empresa_fax'),
    CHtml::textField('geral_empresa_fax', $config->geral_empresa_fax);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('E-mail', 'geral_empresa_email'),
    CHtml::textField('geral_empresa_email', $config->geral_empresa_email, array('class' => 'medium-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Website', 'geral_empresa_url'),
    CHtml::textField('geral_empresa_url', $config->geral_empresa_url, array('class' => 'medium-field', 'maxlength' => 255));
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Horário', 'geral_empresa_horario_inicio'),
    CHtml::textField('geral_empresa_horario_inicio', $config->geral_empresa_horario_inicio, array('class' => 'small-field')),
    ' ás ',
    CHtml::textField('geral_empresa_horario_fim', $config->geral_empresa_horario_fim, array('class' => 'small-field'));
    ?>
</div>

<h3>Página de Contactos</h3>
<div class="linha">
    <?php
    echo CHtml::label('Mostrar página', 'geral_contactos_mostrar'),
    CHtml::checkBox('geral_contactos_mostrar', $config->geral_contactos_mostrar);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Coordenadas (lat/long)', 'geral_contactos_latitude'),
    CHtml::textField('geral_contactos_latitude', $config->geral_contactos_latitude),
    ' : ',
    CHtml::textField('geral_contactos_longitude', $config->geral_contactos_longitude);
    ?>
</div>

<div class="linha">
    <?php
    echo CHtml::label('Chave Google Maps', 'geral_contactos_gmapskey'),
    CHtml::textField('geral_contactos_gmapskey', $config->geral_contactos_gmapskey, array('class' => 'medium-field'));
    ?>
</div>