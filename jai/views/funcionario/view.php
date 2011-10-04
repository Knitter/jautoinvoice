<?php
$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	$model->idFuncionario,
);

$this->menu=array(
	array('label'=>'List Funcionario', 'url'=>array('index')),
	array('label'=>'Create Funcionario', 'url'=>array('create')),
	array('label'=>'Update Funcionario', 'url'=>array('update', 'id'=>$model->idFuncionario)),
	array('label'=>'Delete Funcionario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFuncionario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>

<h1>View Funcionario #<?php echo $model->idFuncionario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFuncionario',
		'valorHora',
	),
)); ?>
