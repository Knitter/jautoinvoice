<?php
$this->breadcrumbs=array(
	'Ivas'=>array('index'),
	$model->idIVA,
);

$this->menu=array(
	array('label'=>'List IVA', 'url'=>array('index')),
	array('label'=>'Create IVA', 'url'=>array('create')),
	array('label'=>'Update IVA', 'url'=>array('update', 'id'=>$model->idIVA)),
	array('label'=>'Delete IVA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idIVA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IVA', 'url'=>array('admin')),
);
?>

<h1>View IVA #<?php echo $model->idIVA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idIVA',
		'descricao',
		'percentagem',
		'activo',
	),
)); ?>
