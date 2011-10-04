<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->idCliente=>array('view','id'=>$model->idCliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'View Cliente', 'url'=>array('view', 'id'=>$model->idCliente)),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<h1>Update Cliente <?php echo $model->idCliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>