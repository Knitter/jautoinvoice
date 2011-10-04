<?php
$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->idMarca,
);

$this->menu=array(
	array('label'=>'List Marca', 'url'=>array('index')),
	array('label'=>'Create Marca', 'url'=>array('create')),
	array('label'=>'Update Marca', 'url'=>array('update', 'id'=>$model->idMarca)),
	array('label'=>'Delete Marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMarca),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Marca', 'url'=>array('admin')),
);
?>

<h1>View Marca #<?php echo $model->idMarca; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMarca',
		'nome',
		'activo',
	),
)); ?>
