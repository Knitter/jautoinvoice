<?php
$this->breadcrumbs=array(
	'Linha Gastos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinhaGasto', 'url'=>array('index')),
	array('label'=>'Manage LinhaGasto', 'url'=>array('admin')),
);
?>

<h1>Create LinhaGasto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>