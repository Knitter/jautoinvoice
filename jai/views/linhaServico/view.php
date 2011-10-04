<?php
$this->breadcrumbs=array(
	'Linha Servicos'=>array('index'),
	$model->idLinhaServico,
);

$this->menu=array(
	array('label'=>'List LinhaServico', 'url'=>array('index')),
	array('label'=>'Create LinhaServico', 'url'=>array('create')),
	array('label'=>'Update LinhaServico', 'url'=>array('update', 'id'=>$model->idLinhaServico)),
	array('label'=>'Delete LinhaServico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLinhaServico),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinhaServico', 'url'=>array('admin')),
);
?>

<h1>View LinhaServico #<?php echo $model->idLinhaServico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idLinhaServico',
		'duracao',
		'valorHora',
		'notas',
		'activo',
		'idFuncionario',
		'idServico',
		'idFolhaObra',
	),
)); ?>
