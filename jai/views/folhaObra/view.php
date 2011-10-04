<?php
$this->breadcrumbs=array(
	'Folha Obras'=>array('index'),
	$model->idFolhaObra,
);

$this->menu=array(
	array('label'=>'List FolhaObra', 'url'=>array('index')),
	array('label'=>'Create FolhaObra', 'url'=>array('create')),
	array('label'=>'Update FolhaObra', 'url'=>array('update', 'id'=>$model->idFolhaObra)),
	array('label'=>'Delete FolhaObra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFolhaObra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FolhaObra', 'url'=>array('admin')),
);
?>

<h1>View FolhaObra #<?php echo $model->idFolhaObra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFolhaObra',
		'data',
		'descricaoAvaria',
		'kms',
		'activo',
		'idVeiculo',
		'idFuncionario',
	),
)); ?>
