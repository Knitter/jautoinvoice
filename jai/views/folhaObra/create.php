<?php
$this->breadcrumbs=array(
	'Folha Obras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FolhaObra', 'url'=>array('index')),
	array('label'=>'Manage FolhaObra', 'url'=>array('admin')),
);
?>

<h1>Create FolhaObra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>