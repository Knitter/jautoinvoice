<?php
$this->breadcrumbs=array(
	'Ivas'=>array('index'),
	$model->idIVA=>array('view','id'=>$model->idIVA),
	'Update',
);

$this->menu=array(
	array('label'=>'List IVA', 'url'=>array('index')),
	array('label'=>'Create IVA', 'url'=>array('create')),
	array('label'=>'View IVA', 'url'=>array('view', 'id'=>$model->idIVA)),
	array('label'=>'Manage IVA', 'url'=>array('admin')),
);
?>

<h1>Update IVA <?php echo $model->idIVA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>