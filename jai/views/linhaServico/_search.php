<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idLinhaServico'); ?>
		<?php echo $form->textField($model,'idLinhaServico',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duracao'); ?>
		<?php echo $form->textField($model,'duracao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorHora'); ?>
		<?php echo $form->textField($model,'valorHora',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notas'); ?>
		<?php echo $form->textArea($model,'notas',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFuncionario'); ?>
		<?php echo $form->textField($model,'idFuncionario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idServico'); ?>
		<?php echo $form->textField($model,'idServico',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idFolhaObra'); ?>
		<?php echo $form->textField($model,'idFolhaObra',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->