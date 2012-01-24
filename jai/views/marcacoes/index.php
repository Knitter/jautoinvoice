<?php
$this->title = 'Marcações';

Yii::app()->clientScript->registerCssFile('css/fullcalendar/fullcalendar.css');

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScriptFile('js/fullcalendar/fullcalendar.min.js');
Yii::app()->clientScript->registerScriptFile('js/jai/marcacoes.js');

$url = $this->createUrl('marcacoes/eventos');
$js = "initCalendar('{$url}');";

Yii::app()->clientScript->registerScript('calInit', $js);
?>

<h2>Marcações</h2>

<div id="calendar"></div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'janelaMarcacao',
    'options' => array(
        'title' => 'Marcar ',
        'autoOpen' => false,
        'minWidth' => 640,
        'minHeight' => 320
    ),
));

$this->renderPartial('_marcacao');

$this->endWidget('zii.widgets.jui.CJuiDialog');