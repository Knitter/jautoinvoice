<?php
$this->breadcrumbs=array(
	'Linha Gastos'=>array('index'),
	$model->idLinhaGasto,
);

$this->menu=array(
	array('label'=>'List LinhaGasto', 'url'=>array('index')),
	array('label'=>'Create LinhaGasto', 'url'=>array('create')),
	array('label'=>'Update LinhaGasto', 'url'=>array('update', 'id'=>$model->idLinhaGasto)),
	array('label'=>'Delete LinhaGasto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLinhaGasto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinhaGasto', 'url'=>array('admin')),
);
?>

<h1>View LinhaGasto #<?php echo $model->idLinhaGasto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idLinhaGasto',
		'quantidade',
		'precoUnitario',
		'activo',
		'idMaterial',
		'idLInhaServico',
	),
)); ?>
