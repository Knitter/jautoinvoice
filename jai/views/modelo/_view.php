<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idModelo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idModelo), array('view', 'id'=>$data->idModelo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMarca')); ?>:</b>
	<?php echo CHtml::encode($data->idMarca); ?>
	<br />


</div>