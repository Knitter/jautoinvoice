<?php
Yii::app()->clientScript->registerCssFile('assets/css/fullcalendar/fullcalendar.css');

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScriptFile('assets/js/fullcalendar/fullcalendar.min.js');

Yii::app()->clientScript->registerScript('calInit', '$("#calendar").fullCalendar({});');
?>

<h2>Marcações</h2>

<div id="calendar"></div>