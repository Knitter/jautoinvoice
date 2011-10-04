<?php
$this->breadcrumbs=array(
	'Fornecedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fornecedor', 'url'=>array('index')),
	array('label'=>'Manage Fornecedor', 'url'=>array('admin')),
);
?>

<h1>Create Fornecedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>