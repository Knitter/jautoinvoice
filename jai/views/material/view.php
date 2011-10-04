<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->idMaterial,
);

$this->menu=array(
	array('label'=>'List Material', 'url'=>array('index')),
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'Update Material', 'url'=>array('update', 'id'=>$model->idMaterial)),
	array('label'=>'Delete Material', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMaterial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<h1>View Material #<?php echo $model->idMaterial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMaterial',
		'precoUnitario',
		'referencia',
		'descricao',
		'activo',
		'idFornecedor',
		'idIVA',
	),
)); ?>
