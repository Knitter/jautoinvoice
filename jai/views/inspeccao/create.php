<?php
$this->breadcrumbs=array(
	'Inspeccaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inspeccao', 'url'=>array('index')),
	array('label'=>'Manage Inspeccao', 'url'=>array('admin')),
);
?>

<h1>Create Inspeccao</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>