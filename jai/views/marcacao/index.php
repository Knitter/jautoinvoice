<?php
$this->titulo = 'Marcações';

$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->baseUrl . '/recursos/css/fullcalendar.min.css');
$cs->registerScriptFile(Yii::app()->baseUrl . '/recursos/js/fullcalendar.min.js');

$js = <<<JS
g.marcacoes.urls.calendario = '{$this->createUrl('marcacao/eventos')}';
g.marcacoes.urls.marcar = '{$this->createUrl('marcacao/marcar')}';
g.marcacoes.urls.actualizar = '{$this->createUrl('marcacao/actualizar')}';
g.marcacoes.urls.folha = '{$this->createUrl('folhaobra/folhademarcacao')}';
g.marcacoes.urls.cancelar = '{$this->createUrl('marcacao/cancelar')}';
    
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