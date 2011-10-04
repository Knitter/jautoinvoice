<?php
$this->breadcrumbs=array(
	'Modelos',
);

$this->menu=array(
	array('label'=>'Create Modelo', 'url'=>array('create')),
	array('label'=>'Manage Modelo', 'url'=>array('admin')),
);
?>

<h1>Modelos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
