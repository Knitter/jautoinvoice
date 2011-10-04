<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idCliente'); ?>
		<?php echo $form->textField($model,'idCliente',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contribuinte'); ?>
		<?php echo $form->textField($model,'contribuinte',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'contribuinte'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->