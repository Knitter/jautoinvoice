<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idContacto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idContacto), array('view', 'id'=>$data->idContacto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contacto')); ?>:</b>
	<?php echo CHtml::encode($data->contacto); ?>
	<br />


</div>