<?php
$this->breadcrumbs=array(
	'Combustivels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Combustivel', 'url'=>array('index')),
	array('label'=>'Manage Combustivel', 'url'=>array('admin')),
);
?>

<h1>Create Combustivel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>