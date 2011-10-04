<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'linha-servico-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'duracao'); ?>
		<?php echo $form->textField($model,'duracao'); ?>
		<?php echo $form->error($model,'duracao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorHora'); ?>
		<?php echo $form->textField($model,'valorHora',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'valorHora'); ?>
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
		<?php echo $form->labelEx($model,'idFuncionario'); ?>
		<?php echo $form->textField($model,'idFuncionario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idFuncionario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idServico'); ?>
		<?php echo $form->textField($model,'idServico',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idServico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idFolhaObra'); ?>
		<?php echo $form->textField($model,'idFolhaObra',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idFolhaObra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->