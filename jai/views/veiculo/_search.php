<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idVeiculo'); ?>
		<?php echo $form->textField($model,'idVeiculo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dataRegisto'); ?>
		<?php echo $form->textField($model,'dataRegisto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nrChassis'); ?>
		<?php echo $form->textField($model,'nrChassis',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cilindrada'); ?>
		<?php echo $form->textField($model,'cilindrada',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nrMotor'); ?>
		<?php echo $form->textField($model,'nrMotor',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notas'); ?>
		<?php echo $form->textArea($model,'notas',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idCombustivel'); ?>
		<?php echo $form->textField($model,'idCombustivel',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idModelo'); ?>
		<?php echo $form->textField($model,'idModelo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->