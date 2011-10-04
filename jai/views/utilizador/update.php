<?php
$this->breadcrumbs=array(
	'Utilizadors'=>array('index'),
	$model->idUtilizador=>array('view','id'=>$model->idUtilizador),
	'Update',
);

$this->menu=array(
	array('label'=>'List Utilizador', 'url'=>array('index')),
	array('label'=>'Create Utilizador', 'url'=>array('create')),
	array('label'=>'View Utilizador', 'url'=>array('view', 'id'=>$model->idUtilizador)),
	array('label'=>'Manage Utilizador', 'url'=>array('admin')),
);
?>

<h1>Update Utilizador <?php echo $model->idUtilizador; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>