<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->idCategoria=>array('view','id'=>$model->idCategoria),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categoria', 'url'=>array('index')),
	array('label'=>'Create Categoria', 'url'=>array('create')),
	array('label'=>'View Categoria', 'url'=>array('view', 'id'=>$model->idCategoria)),
	array('label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<h1>Update Categoria <?php echo $model->idCategoria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>