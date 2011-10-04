<?php
$this->breadcrumbs=array(
	'Estado Inspeccaos'=>array('index'),
	$model->idEstadoInspeccao=>array('view','id'=>$model->idEstadoInspeccao),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstadoInspeccao', 'url'=>array('index')),
	array('label'=>'Create EstadoInspeccao', 'url'=>array('create')),
	array('label'=>'View EstadoInspeccao', 'url'=>array('view', 'id'=>$model->idEstadoInspeccao)),
	array('label'=>'Manage EstadoInspeccao', 'url'=>array('admin')),
);
?>

<h1>Update EstadoInspeccao <?php echo $model->idEstadoInspeccao; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>