<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFuncionario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFuncionario), array('view', 'id'=>$data->idFuncionario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorHora')); ?>:</b>
	<?php echo CHtml::encode($data->valorHora); ?>
	<br />


</div>