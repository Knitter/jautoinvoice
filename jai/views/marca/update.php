<?php
$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->idMarca=>array('view','id'=>$model->idMarca),
	'Update',
);

$this->menu=array(
	array('label'=>'List Marca', 'url'=>array('index')),
	array('label'=>'Create Marca', 'url'=>array('create')),
	array('label'=>'View Marca', 'url'=>array('view', 'id'=>$model->idMarca)),
	array('label'=>'Manage Marca', 'url'=>array('admin')),
);
?>

<h1>Update Marca <?php echo $model->idMarca; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>