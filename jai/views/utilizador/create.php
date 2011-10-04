<?php
$this->breadcrumbs=array(
	'Utilizadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Utilizador', 'url'=>array('index')),
	array('label'=>'Manage Utilizador', 'url'=>array('admin')),
);
?>

<h1>Create Utilizador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>