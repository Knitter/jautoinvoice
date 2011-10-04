<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLinhaServico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLinhaServico), array('view', 'id'=>$data->idLinhaServico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracao')); ?>:</b>
	<?php echo CHtml::encode($data->duracao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorHora')); ?>:</b>
	<?php echo CHtml::encode($data->valorHora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notas')); ?>:</b>
	<?php echo CHtml::encode($data->notas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFuncionario')); ?>:</b>
	<?php echo CHtml::encode($data->idFuncionario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idServico')); ?>:</b>
	<?php echo CHtml::encode($data->idServico); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idFolhaObra')); ?>:</b>
	<?php echo CHtml::encode($data->idFolhaObra); ?>
	<br />

	*/ ?>

</div>