<?php
$this->breadcrumbs=array(
	'Fornecedors'=>array('index'),
	$model->idFornecedor,
);

$this->menu=array(
	array('label'=>'List Fornecedor', 'url'=>array('index')),
	array('label'=>'Create Fornecedor', 'url'=>array('create')),
	array('label'=>'Update Fornecedor', 'url'=>array('update', 'id'=>$model->idFornecedor)),
	array('label'=>'Delete Fornecedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFornecedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fornecedor', 'url'=>array('admin')),
);
?>

<h1>View Fornecedor #<?php echo $model->idFornecedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFornecedor',
		'nome',
		'email',
		'notas',
		'activo',
	),
)); ?>
