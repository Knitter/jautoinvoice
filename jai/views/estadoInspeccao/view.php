<?php
$this->breadcrumbs=array(
	'Estado Inspeccaos'=>array('index'),
	$model->idEstadoInspeccao,
);

$this->menu=array(
	array('label'=>'List EstadoInspeccao', 'url'=>array('index')),
	array('label'=>'Create EstadoInspeccao', 'url'=>array('create')),
	array('label'=>'Update EstadoInspeccao', 'url'=>array('update', 'id'=>$model->idEstadoInspeccao)),
	array('label'=>'Delete EstadoInspeccao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEstadoInspeccao),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstadoInspeccao', 'url'=>array('admin')),
);
?>

<h1>View EstadoInspeccao #<?php echo $model->idEstadoInspeccao; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEstadoInspeccao',
		'nome',
		'activo',
	),
)); ?>
