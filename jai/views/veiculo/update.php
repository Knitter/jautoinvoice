<?php
$this->breadcrumbs=array(
	'Veiculos'=>array('index'),
	$model->idVeiculo=>array('view','id'=>$model->idVeiculo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Veiculo', 'url'=>array('index')),
	array('label'=>'Create Veiculo', 'url'=>array('create')),
	array('label'=>'View Veiculo', 'url'=>array('view', 'id'=>$model->idVeiculo)),
	array('label'=>'Manage Veiculo', 'url'=>array('admin')),
);
?>

<h1>Update Veiculo <?php echo $model->idVeiculo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>