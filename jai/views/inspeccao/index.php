<?php
$this->breadcrumbs=array(
	'Inspeccaos',
);

$this->menu=array(
	array('label'=>'Create Inspeccao', 'url'=>array('create')),
	array('label'=>'Manage Inspeccao', 'url'=>array('admin')),
);
?>

<h1>Inspeccaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
