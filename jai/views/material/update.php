<?php
$this->breadcrumbs=array(
	'Materials'=>array('index'),
	$model->idMaterial=>array('view','id'=>$model->idMaterial),
	'Update',
);

$this->menu=array(
	array('label'=>'List Material', 'url'=>array('index')),
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'View Material', 'url'=>array('view', 'id'=>$model->idMaterial)),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<h1>Update Material <?php echo $model->idMaterial; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>