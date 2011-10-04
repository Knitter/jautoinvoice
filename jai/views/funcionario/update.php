<?php
$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	$model->idFuncionario=>array('view','id'=>$model->idFuncionario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Funcionario', 'url'=>array('index')),
	array('label'=>'Create Funcionario', 'url'=>array('create')),
	array('label'=>'View Funcionario', 'url'=>array('view', 'id'=>$model->idFuncionario)),
	array('label'=>'Manage Funcionario', 'url'=>array('admin')),
);
?>

<h1>Update Funcionario <?php echo $model->idFuncionario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>