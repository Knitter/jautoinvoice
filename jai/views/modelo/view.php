<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->idModelo,
);

$this->menu=array(
	array('label'=>'List Modelo', 'url'=>array('index')),
	array('label'=>'Create Modelo', 'url'=>array('create')),
	array('label'=>'Update Modelo', 'url'=>array('update', 'id'=>$model->idModelo)),
	array('label'=>'Delete Modelo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idModelo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modelo', 'url'=>array('admin')),
);
?>

<h1>View Modelo #<?php echo $model->idModelo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idModelo',
		'nome',
		'activo',
		'idMarca',
	),
)); ?>
