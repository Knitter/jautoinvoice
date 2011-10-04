<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInspeccao')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInspeccao), array('view', 'id'=>$data->idInspeccao)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notas')); ?>:</b>
	<?php echo CHtml::encode($data->notas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoInspeccao')); ?>:</b>
	<?php echo CHtml::encode($data->idEstadoInspeccao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFuncionario')); ?>:</b>
	<?php echo CHtml::encode($data->idFuncionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVeiculo')); ?>:</b>
	<?php echo CHtml::encode($data->idVeiculo); ?>
	<br />


</div>