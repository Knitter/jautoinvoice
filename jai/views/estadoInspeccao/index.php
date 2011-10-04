<?php
$this->breadcrumbs=array(
	'Estado Inspeccaos',
);

$this->menu=array(
	array('label'=>'Create EstadoInspeccao', 'url'=>array('create')),
	array('label'=>'Manage EstadoInspeccao', 'url'=>array('admin')),
);
?>

<h1>Estado Inspeccaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
