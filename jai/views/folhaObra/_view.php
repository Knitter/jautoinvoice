<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFolhaObra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFolhaObra), array('view', 'id'=>$data->idFolhaObra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricaoAvaria')); ?>:</b>
	<?php echo CHtml::encode($data->descricaoAvaria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kms')); ?>:</b>
	<?php echo CHtml::encode($data->kms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVeiculo')); ?>:</b>
	<?php echo CHtml::encode($data->idVeiculo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFuncionario')); ?>:</b>
	<?php echo CHtml::encode($data->idFuncionario); ?>
	<br />


</div>