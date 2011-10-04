<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFolhaObra'); ?>
		<?php echo $form->textField($model,'idFolhaObra',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descricaoAvaria'); ?>
		<?php echo $form->textArea($model,'descricaoAvaria',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kms'); ?>
		<?php echo $form->textField($model,'kms'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idVeiculo'); ?>
		<?php echo $form->textField($model,'idVeiculo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFuncionario'); ?>
		<?php echo $form->textField($model,'idFuncionario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->