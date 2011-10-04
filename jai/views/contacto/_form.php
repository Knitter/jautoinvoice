<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contacto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contacto'); ?>
		<?php echo $form->textField($model,'contacto',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contacto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->