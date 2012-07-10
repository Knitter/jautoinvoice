<?php
$this->titulo = 'Configurações de Sistema';

$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->baseUrl . '/recursos/js/jquery.collapse.min.js');
$cs->registerScript('initTixa', '$("#tixa").collapse();');
?>
<h2>Configurações de Sistema</h2>

<div id="tixa">
    <?php
    $nim = array('nao' => 'Não', 'sim' => 'Sim');

    echo CHtml::form($this->createUrl('configuracoes/gravar'));

    $this->renderPartial('_intro');
    $this->renderPartial('_geral', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_email', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_sms', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_suporte', array('config' => $config, 'nim' => $nim));
    ?>
    <div class="row">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
            'name' => 'save'
        ));
        ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>