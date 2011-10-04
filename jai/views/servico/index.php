<?php
$this->breadcrumbs=array(
	'Servicos',
);

$this->menu=array(
	array('label'=>'Create Servico', 'url'=>array('create')),
	array('label'=>'Manage Servico', 'url'=>array('admin')),
);
?>

<h1>Servicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
