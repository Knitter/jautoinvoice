<?php $this->titulo = 'Configurações de Sistema'; ?>

<h2>Configurações de Sistema</h2>

<?php echo CHtml::form($this->createUrl('configuracao/index')); ?>

<div class="form">
    <?php
    $this->widget('CTabView', array(
        'tabs' => array(
            'tab1' => array(
                'title' => 'Introdução',
                'view' => '_intro'
            ),
            'tab2' => array(
                'title' => 'Configurações Gerais',
                'view' => '_geral',
                'data' => array('config' => $config, 'nim' => $nim, 'notificacoes' => $notificacoes),
            ),
            'tab3' => array(
                'title' => 'Configurações de E-mail',
                'view' => '_email',
                'data' => array('config' => $config, 'nim' => $nim)
            ),
            'tab4' => array(
                'title' => 'Sistema de SMSs',
                'view' => '_sms',
                'data' => array('config' => $config, 'nim' => $nim)
            ),
            'tab5' => array(
                'title' => 'Opções de Suporte',
                'view' => '_suporte',
                'data' => array('config' => $config, 'nim' => $nim)
            )
            ))
    );
    ?>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
            'name' => 'save'
        ));
        ?>
    </div>
</div>

<?php
echo CHtml::endForm();