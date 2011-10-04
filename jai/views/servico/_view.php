<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idServico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idServico), array('view', 'id'=>$data->idServico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>