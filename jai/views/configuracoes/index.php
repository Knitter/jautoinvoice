<?php
$this->title = 'Configurações de Sistema';

Yii::app()->clientScript->registerCssFile('css/formularios.css');
Yii::app()->clientScript->registerScriptFile('js/collapse/jquery.collapse.js');
Yii::app()->clientScript->registerScript('init', '$("#tixa").collapse();');
?>
<h2>Configurações de Sistema</h2>

<div id="tixa">
    <?php
    $nim = array(0 => 'Não', 1 => 'Sim');

    echo CHtml::form();

    $this->renderPartial('_intro');
    $this->renderPartial('_geral', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_email', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_sms', array('config' => $config, 'nim' => $nim));
    $this->renderPartial('_suporte', array('config' => $config, 'nim' => $nim));
    ?>
    <div class="row">
        <?php echo CHtml::submitButton('Gravar'); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>