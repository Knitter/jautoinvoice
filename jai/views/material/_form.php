<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'material-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'precoUnitario'); ?>
		<?php echo $form->textField($model,'precoUnitario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precoUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFornecedor'); ?>
		<?php echo $form->textField($model,'idFornecedor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idFornecedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idIVA'); ?>
		<?php echo $form->textField($model,'idIVA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idIVA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->