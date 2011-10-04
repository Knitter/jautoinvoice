<?php
$this->breadcrumbs=array(
	'Fornecedors'=>array('index'),
	$model->idFornecedor=>array('view','id'=>$model->idFornecedor),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fornecedor', 'url'=>array('index')),
	array('label'=>'Create Fornecedor', 'url'=>array('create')),
	array('label'=>'View Fornecedor', 'url'=>array('view', 'id'=>$model->idFornecedor)),
	array('label'=>'Manage Fornecedor', 'url'=>array('admin')),
);
?>

<h1>Update Fornecedor <?php echo $model->idFornecedor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>