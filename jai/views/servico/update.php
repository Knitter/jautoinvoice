<?php
$this->breadcrumbs=array(
	'Servicos'=>array('index'),
	$model->idServico=>array('view','id'=>$model->idServico),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servico', 'url'=>array('index')),
	array('label'=>'Create Servico', 'url'=>array('create')),
	array('label'=>'View Servico', 'url'=>array('view', 'id'=>$model->idServico)),
	array('label'=>'Manage Servico', 'url'=>array('admin')),
);
?>

<h1>Update Servico <?php echo $model->idServico; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>