<?php
$this->title = 'Marcações';

Yii::app()->clientScript->registerCssFile('css/fullcalendar/fullcalendar.css');

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScriptFile('js/fullcalendar/fullcalendar.min.js');
Yii::app()->clientScript->registerScriptFile('js/jai/marcacoes.js');

$js = <<<JS
globais.url.calendario = '{$this->createUrl('marcacoes/eventos')}';
globais.url.marcar = '{$this->createUrl('marcacoes/marcar')}';
globais.url.actualizar = '{$this->createUrl('marcacoes/actualizar')}';
globais.url.folha = '{$this->createUrl('obras/folhademarcacao')}';
globais.url.cancelar = '{$this->createUrl('marcacoes/cancelar')}';

initCalendar();
initTimePicker();
JS;

Yii::app()->clientScript->registerScript('calInit', $js);
?>

<h2>Marcações</h2>

<div id="calendar"></div>

<?php
$this->renderPartial('_marcacao');

$this->renderPartial('_evento');