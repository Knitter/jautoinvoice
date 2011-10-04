<?php
$this->breadcrumbs=array(
	'Folha Obras',
);

$this->menu=array(
	array('label'=>'Create FolhaObra', 'url'=>array('create')),
	array('label'=>'Manage FolhaObra', 'url'=>array('admin')),
);
?>

<h1>Folha Obras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
