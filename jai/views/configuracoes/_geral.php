<h3>Geral</h3>
<div class="configuracoes">
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
        echo CHtml::label('Permitir acesso de clientes', 'permitirClientes'),
        CHtml::dropDownList('permitirClientes', $config->permitirClientes, $nim);
        ?>
    </div>
</div>
