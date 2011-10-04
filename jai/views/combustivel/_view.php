<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCombustivel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCombustivel), array('view', 'id'=>$data->idCombustivel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>