<?php
$this->breadcrumbs=array(
	'Inspeccaos'=>array('index'),
	$model->idInspeccao=>array('view','id'=>$model->idInspeccao),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inspeccao', 'url'=>array('index')),
	array('label'=>'Create Inspeccao', 'url'=>array('create')),
	array('label'=>'View Inspeccao', 'url'=>array('view', 'id'=>$model->idInspeccao)),
	array('label'=>'Manage Inspeccao', 'url'=>array('admin')),
);
?>

<h1>Update Inspeccao <?php echo $model->idInspeccao; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>