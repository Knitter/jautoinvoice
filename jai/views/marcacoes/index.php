<?php
$this->title = 'Marcações';

$cs = Yii::app()->clientScript;
$cs->registerCssFile('css/fullcalendar.min.css');
$cs->registerScriptFile('js/fullcalendar.min.js');

$js = <<<JS
g.marcacoes.urls.calendario = '{$this->createUrl('marcacoes/eventos')}';
g.marcacoes.urls.marcar = '{$this->createUrl('marcacoes/marcar')}';
g.marcacoes.urls.actualizar = '{$this->createUrl('marcacoes/actualizar')}';
g.marcacoes.urls.folha = '{$this->createUrl('obras/folhademarcacao')}';
g.marcacoes.urls.cancelar = '{$this->createUrl('marcacoes/cancelar')}';
    
g.marcacoes.urls.inicio = {$inicio};
g.marcacoes.urls.fim = {$fim};

initCalendar();
initTimePicker();
JS;

$cs->registerScript('initCalendario', $js);
?>

<h2>Marcações</h2>

<div id="calendar"></div>

<?php
$this->renderPartial('_marcacao');

$this->renderPartial('_evento');