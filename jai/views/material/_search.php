<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idMaterial'); ?>
		<?php echo $form->textField($model,'idMaterial',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precoUnitario'); ?>
		<?php echo $form->textField($model,'precoUnitario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descricao'); ?>
		<?php echo $form->textArea($model,'descricao',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFornecedor'); ?>
		<?php echo $form->textField($model,'idFornecedor',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idIVA'); ?>
		<?php echo $form->textField($model,'idIVA',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->