<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'linha-gasto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'quantidade'); ?>
		<?php echo $form->textField($model,'quantidade'); ?>
		<?php echo $form->error($model,'quantidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precoUnitario'); ?>
		<?php echo $form->textField($model,'precoUnitario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precoUnitario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMaterial'); ?>
		<?php echo $form->textField($model,'idMaterial',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idMaterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idLInhaServico'); ?>
		<?php echo $form->textField($model,'idLInhaServico',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idLInhaServico'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->