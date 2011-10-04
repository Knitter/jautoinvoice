<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLinhaGasto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLinhaGasto), array('view', 'id'=>$data->idLinhaGasto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantidade')); ?>:</b>
	<?php echo CHtml::encode($data->quantidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precoUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->precoUnitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMaterial')); ?>:</b>
	<?php echo CHtml::encode($data->idMaterial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLInhaServico')); ?>:</b>
	<?php echo CHtml::encode($data->idLInhaServico); ?>
	<br />


</div>