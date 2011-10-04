<?php
$this->breadcrumbs=array(
	'Linha Servicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinhaServico', 'url'=>array('index')),
	array('label'=>'Manage LinhaServico', 'url'=>array('admin')),
);
?>

<h1>Create LinhaServico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>