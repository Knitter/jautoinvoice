<?php $this->titulo = 'Configurações de Sistema'; ?>

<h2>Configurações de Sistema</h2>

<?php
$nim = array('nao' => 'Não', 'sim' => 'Sim');

echo CHtml::form($this->createUrl('configuracao/gravar'));

$this->widget('CTabView', array(
    'tabs' => array(
        'tab1' => array(
            'title' => 'Introdução',
            'view' => '_intro'
        ),
        'tab2' => array(
            'title' => 'Geral',
            'view' => '_geral',
            'data' => array('config' => $config, 'nim' => $nim),
        ),
        'tab3' => array(
            'title' => 'E-mail',
            'view' => '_email',
            'data' => array('config' => $config, 'nim' => $nim)
        ),
        'tab4' => array(
            'title' => 'SMS',
            'view' => '_sms',
            'data' => array('config' => $config, 'nim' => $nim)
        ),
        'tab5' => array(
            'title' => 'CMS',
            'view' => '_cms',
            'data' => array('config' => $config, 'nim' => $nim)
        ),
        'tab6' => array(
            'title' => 'Suporte',
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

<?php echo CHtml::endForm(); ?>