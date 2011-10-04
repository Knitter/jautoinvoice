<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inspeccao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
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
		<?php echo $form->labelEx($model,'idEstadoInspeccao'); ?>
		<?php echo $form->textField($model,'idEstadoInspeccao',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idEstadoInspeccao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFuncionario'); ?>
		<?php echo $form->textField($model,'idFuncionario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idFuncionario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idVeiculo'); ?>
		<?php echo $form->textField($model,'idVeiculo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idVeiculo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->