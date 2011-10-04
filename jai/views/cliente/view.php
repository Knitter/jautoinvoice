<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idCliente,
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Update Cliente', 'url'=>array('update', 'id'=>$model->idCliente)),
	array('label'=>'Delete Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<h1>View Cliente #<?php echo $model->idCliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCliente',
		'contribuinte',
	),
)); ?>
