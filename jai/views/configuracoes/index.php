<?php 
$this->title = 'Configurações de Sistema';

Yii::app()->clientScript->registerScriptFile('js/collapse/jquery.collapse.js');

Yii::app()->clientScript->registerScript('init', '$("#tixa").collapse();');
?>
<h2>Configurações de Sistema</h2>

<div id="tixa">
    <?php
    $this->renderPartial('_intro');
    $this->renderPartial('_geral');
    $this->renderPartial('_email');
    $this->renderPartial('_sms');
    $this->renderPartial('_suporte');
    ?>
</div>