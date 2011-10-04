<?php
$this->breadcrumbs=array(
	'Combustivels'=>array('index'),
	$model->idCombustivel,
);

$this->menu=array(
	array('label'=>'List Combustivel', 'url'=>array('index')),
	array('label'=>'Create Combustivel', 'url'=>array('create')),
	array('label'=>'Update Combustivel', 'url'=>array('update', 'id'=>$model->idCombustivel)),
	array('label'=>'Delete Combustivel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCombustivel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Combustivel', 'url'=>array('admin')),
);
?>

<h1>View Combustivel #<?php echo $model->idCombustivel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCombustivel',
		'nome',
		'activo',
	),
)); ?>
