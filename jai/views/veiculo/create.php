<?php
$this->breadcrumbs=array(
	'Veiculos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Veiculo', 'url'=>array('index')),
	array('label'=>'Manage Veiculo', 'url'=>array('admin')),
);
?>

<h1>Create Veiculo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>