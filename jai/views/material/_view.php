<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMaterial')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMaterial), array('view', 'id'=>$data->idMaterial)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precoUnitario')); ?>:</b>
	<?php echo CHtml::encode($data->precoUnitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</b>
	<?php echo CHtml::encode($data->referencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFornecedor')); ?>:</b>
	<?php echo CHtml::encode($data->idFornecedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idIVA')); ?>:</b>
	<?php echo CHtml::encode($data->idIVA); ?>
	<br />


</div>