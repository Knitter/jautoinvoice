<?php
$this->title = 'Dashboard';

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
    <div class="widget ui-corner-all">
        <div class="widget-header">Marcações</div>
        <div class="widget-body">
            
        </div>
    </div>

    <div class="widget ui-corner-all">
        <div class="widget-header">WDemo 2</div>
        <div class="widget-body"></div>
    </div>
</div>
<div id="coluna-2" class="span-11">
    <div class="widget ui-corner-all">
        <div class="widget-header">Avisos</div>
        <div class="widget-body"></div>
    </div>
</div>