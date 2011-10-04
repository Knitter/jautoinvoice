<?php
$this->breadcrumbs=array(
	'Combustivels',
);

$this->menu=array(
	array('label'=>'Create Combustivel', 'url'=>array('create')),
	array('label'=>'Manage Combustivel', 'url'=>array('admin')),
);
?>

<h1>Combustivels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
