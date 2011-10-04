<?php
$this->breadcrumbs=array(
	'Fornecedors',
);

$this->menu=array(
	array('label'=>'Create Fornecedor', 'url'=>array('create')),
	array('label'=>'Manage Fornecedor', 'url'=>array('admin')),
);
?>

<h1>Fornecedors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
