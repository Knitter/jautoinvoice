<?php
$this->breadcrumbs=array(
	'Folha Obras'=>array('index'),
	$model->idFolhaObra=>array('view','id'=>$model->idFolhaObra),
	'Update',
);

$this->menu=array(
	array('label'=>'List FolhaObra', 'url'=>array('index')),
	array('label'=>'Create FolhaObra', 'url'=>array('create')),
	array('label'=>'View FolhaObra', 'url'=>array('view', 'id'=>$model->idFolhaObra)),
	array('label'=>'Manage FolhaObra', 'url'=>array('admin')),
);
?>

<h1>Update FolhaObra <?php echo $model->idFolhaObra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>