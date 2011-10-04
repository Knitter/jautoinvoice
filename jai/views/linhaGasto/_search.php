<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idLinhaGasto'); ?>
		<?php echo $form->textField($model,'idLinhaGasto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantidade'); ?>
		<?php echo $form->textField($model,'quantidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precoUnitario'); ?>
		<?php echo $form->textField($model,'precoUnitario',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idMaterial'); ?>
		<?php echo $form->textField($model,'idMaterial',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idLInhaServico'); ?>
		<?php echo $form->textField($model,'idLInhaServico',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->