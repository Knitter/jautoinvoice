<?php
$this->breadcrumbs=array(
	'Servicos'=>array('index'),
	$model->idServico,
);

$this->menu=array(
	array('label'=>'List Servico', 'url'=>array('index')),
	array('label'=>'Create Servico', 'url'=>array('create')),
	array('label'=>'Update Servico', 'url'=>array('update', 'id'=>$model->idServico)),
	array('label'=>'Delete Servico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idServico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servico', 'url'=>array('admin')),
);
?>

<h1>View Servico #<?php echo $model->idServico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idServico',
		'nome',
		'descricao',
		'activo',
	),
)); ?>
