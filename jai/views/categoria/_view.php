<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCategoria), array('view', 'id'=>$data->idCategoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>