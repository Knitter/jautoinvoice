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
$this->renderPartial('_marcacao');