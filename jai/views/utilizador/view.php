<?php
$this->breadcrumbs=array(
	'Utilizadors'=>array('index'),
	$model->idUtilizador,
);

$this->menu=array(
	array('label'=>'List Utilizador', 'url'=>array('index')),
	array('label'=>'Create Utilizador', 'url'=>array('create')),
	array('label'=>'Update Utilizador', 'url'=>array('update', 'id'=>$model->idUtilizador)),
	array('label'=>'Delete Utilizador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUtilizador),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Utilizador', 'url'=>array('admin')),
);
?>

<h1>View Utilizador #<?php echo $model->idUtilizador; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idUtilizador',
		'username',
		'password',
		'nome',
		'activo',
	),
)); ?>
