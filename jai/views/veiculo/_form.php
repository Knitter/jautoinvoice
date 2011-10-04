<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'veiculo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dataRegisto'); ?>
		<?php echo $form->textField($model,'dataRegisto'); ?>
		<?php echo $form->error($model,'dataRegisto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'matricula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nrChassis'); ?>
		<?php echo $form->textField($model,'nrChassis',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nrChassis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cilindrada'); ?>
		<?php echo $form->textField($model,'cilindrada',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'cilindrada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nrMotor'); ?>
		<?php echo $form->textField($model,'nrMotor',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nrMotor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notas'); ?>
		<?php echo $form->textArea($model,'notas',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCategoria'); ?>
		<?php echo $form->textField($model,'idCategoria',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idCategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCombustivel'); ?>
		<?php echo $form->textField($model,'idCombustivel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idCombustivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idModelo'); ?>
		<?php echo $form->textField($model,'idModelo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idModelo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->