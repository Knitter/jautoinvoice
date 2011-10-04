<?php
$this->breadcrumbs=array(
	'Linha Servicos'=>array('index'),
	$model->idLinhaServico=>array('view','id'=>$model->idLinhaServico),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinhaServico', 'url'=>array('index')),
	array('label'=>'Create LinhaServico', 'url'=>array('create')),
	array('label'=>'View LinhaServico', 'url'=>array('view', 'id'=>$model->idLinhaServico)),
	array('label'=>'Manage LinhaServico', 'url'=>array('admin')),
);
?>

<h1>Update LinhaServico <?php echo $model->idLinhaServico; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>