<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCliente), array('view', 'id'=>$data->idCliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contribuinte')); ?>:</b>
	<?php echo CHtml::encode($data->contribuinte); ?>
	<br />


</div>