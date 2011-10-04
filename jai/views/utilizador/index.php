<?php
$this->breadcrumbs=array(
	'Utilizadors',
);

$this->menu=array(
	array('label'=>'Create Utilizador', 'url'=>array('create')),
	array('label'=>'Manage Utilizador', 'url'=>array('admin')),
);
?>

<h1>Utilizadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
