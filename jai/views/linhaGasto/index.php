<?php
$this->breadcrumbs=array(
	'Linha Gastos',
);

$this->menu=array(
	array('label'=>'Create LinhaGasto', 'url'=>array('create')),
	array('label'=>'Manage LinhaGasto', 'url'=>array('admin')),
);
?>

<h1>Linha Gastos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
