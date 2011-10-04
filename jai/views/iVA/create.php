<?php
$this->breadcrumbs=array(
	'Ivas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IVA', 'url'=>array('index')),
	array('label'=>'Manage IVA', 'url'=>array('admin')),
);
?>

<h1>Create IVA</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>