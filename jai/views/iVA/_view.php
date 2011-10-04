<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idIVA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idIVA), array('view', 'id'=>$data->idIVA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentagem')); ?>:</b>
	<?php echo CHtml::encode($data->percentagem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>