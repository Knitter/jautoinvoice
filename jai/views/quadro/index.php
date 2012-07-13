<?php
$this->titulo = 'Quadro';

$js = <<<JS
$("#coluna-1, #coluna-2").sortable({
    connectWith: "#coluna-1, #coluna-2",
    handle: '.widget-header',
    opacity: 0.7
});
  
$("#coluna-1, #coluna-2").disableSelection();
JS;

Yii::app()->clientScript->registerScript('initDash', $js);
?>

<div id="coluna-1" class="span-11 append-1">
    <?php
    $this->renderPartial('_widget-marcacoes', array('marcacoes' => $marcacoes));
    ?>
</div>
<div id="coluna-2" class="span-11">
    <?php
    $this->renderPartial('_widget-avisos', array('avisos' => $avisos));
    ?>
</div>