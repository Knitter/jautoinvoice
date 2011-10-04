<?php
$this->breadcrumbs=array(
	'Ivas',
);

$this->menu=array(
	array('label'=>'Create IVA', 'url'=>array('create')),
	array('label'=>'Manage IVA', 'url'=>array('admin')),
);
?>

<h1>Ivas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
