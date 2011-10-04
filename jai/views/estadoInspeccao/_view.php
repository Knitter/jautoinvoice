<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoInspeccao')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstadoInspeccao), array('view', 'id'=>$data->idEstadoInspeccao)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>