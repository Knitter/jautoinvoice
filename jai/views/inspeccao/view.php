<?php
$this->breadcrumbs=array(
	'Inspeccaos'=>array('index'),
	$model->idInspeccao,
);

$this->menu=array(
	array('label'=>'List Inspeccao', 'url'=>array('index')),
	array('label'=>'Create Inspeccao', 'url'=>array('create')),
	array('label'=>'Update Inspeccao', 'url'=>array('update', 'id'=>$model->idInspeccao)),
	array('label'=>'Delete Inspeccao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInspeccao),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inspeccao', 'url'=>array('admin')),
);
?>

<h1>View Inspeccao #<?php echo $model->idInspeccao; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInspeccao',
		'data',
		'notas',
		'activo',
		'idEstadoInspeccao',
		'idFuncionario',
		'idVeiculo',
	),
)); ?>
