<?php
$this->breadcrumbs=array(
	'Veiculos',
);

$this->menu=array(
	array('label'=>'Create Veiculo', 'url'=>array('create')),
	array('label'=>'Manage Veiculo', 'url'=>array('admin')),
);
?>

<h1>Veiculos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
