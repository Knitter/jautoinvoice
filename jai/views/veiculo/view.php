<?php
$this->breadcrumbs=array(
	'Veiculos'=>array('index'),
	$model->idVeiculo,
);

$this->menu=array(
	array('label'=>'List Veiculo', 'url'=>array('index')),
	array('label'=>'Create Veiculo', 'url'=>array('create')),
	array('label'=>'Update Veiculo', 'url'=>array('update', 'id'=>$model->idVeiculo)),
	array('label'=>'Delete Veiculo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idVeiculo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Veiculo', 'url'=>array('admin')),
);
?>

<h1>View Veiculo #<?php echo $model->idVeiculo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idVeiculo',
		'dataRegisto',
		'matricula',
		'nrChassis',
		'cilindrada',
		'nrMotor',
		'notas',
		'activo',
		'idCliente',
		'idCategoria',
		'idCombustivel',
		'idModelo',
	),
)); ?>
