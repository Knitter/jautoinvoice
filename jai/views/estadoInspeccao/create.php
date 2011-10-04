<?php
$this->breadcrumbs=array(
	'Estado Inspeccaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstadoInspeccao', 'url'=>array('index')),
	array('label'=>'Manage EstadoInspeccao', 'url'=>array('admin')),
);
?>

<h1>Create EstadoInspeccao</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>