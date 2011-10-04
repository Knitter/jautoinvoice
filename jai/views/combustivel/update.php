<?php
$this->breadcrumbs=array(
	'Combustivels'=>array('index'),
	$model->idCombustivel=>array('view','id'=>$model->idCombustivel),
	'Update',
);

$this->menu=array(
	array('label'=>'List Combustivel', 'url'=>array('index')),
	array('label'=>'Create Combustivel', 'url'=>array('create')),
	array('label'=>'View Combustivel', 'url'=>array('view', 'id'=>$model->idCombustivel)),
	array('label'=>'Manage Combustivel', 'url'=>array('admin')),
);
?>

<h1>Update Combustivel <?php echo $model->idCombustivel; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>