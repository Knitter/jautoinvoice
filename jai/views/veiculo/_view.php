<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVeiculo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idVeiculo), array('view', 'id'=>$data->idVeiculo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataRegisto')); ?>:</b>
	<?php echo CHtml::encode($data->dataRegisto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matricula')); ?>:</b>
	<?php echo CHtml::encode($data->matricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrChassis')); ?>:</b>
	<?php echo CHtml::encode($data->nrChassis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cilindrada')); ?>:</b>
	<?php echo CHtml::encode($data->cilindrada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrMotor')); ?>:</b>
	<?php echo CHtml::encode($data->nrMotor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notas')); ?>:</b>
	<?php echo CHtml::encode($data->notas); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCombustivel')); ?>:</b>
	<?php echo CHtml::encode($data->idCombustivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idModelo')); ?>:</b>
	<?php echo CHtml::encode($data->idModelo); ?>
	<br />

	*/ ?>

</div>