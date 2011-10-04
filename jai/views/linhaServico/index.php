<?php
$this->breadcrumbs=array(
	'Linha Servicos',
);

$this->menu=array(
	array('label'=>'Create LinhaServico', 'url'=>array('create')),
	array('label'=>'Manage LinhaServico', 'url'=>array('admin')),
);
?>

<h1>Linha Servicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
