<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'funcionario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idFuncionario'); ?>
		<?php echo $form->textField($model,'idFuncionario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idFuncionario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorHora'); ?>
		<?php echo $form->textField($model,'valorHora',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'valorHora'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->