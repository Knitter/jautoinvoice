<?php
$this->breadcrumbs=array(
	'Linha Gastos'=>array('index'),
	$model->idLinhaGasto=>array('view','id'=>$model->idLinhaGasto),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinhaGasto', 'url'=>array('index')),
	array('label'=>'Create LinhaGasto', 'url'=>array('create')),
	array('label'=>'View LinhaGasto', 'url'=>array('view', 'id'=>$model->idLinhaGasto)),
	array('label'=>'Manage LinhaGasto', 'url'=>array('admin')),
);
?>

<h1>Update LinhaGasto <?php echo $model->idLinhaGasto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>