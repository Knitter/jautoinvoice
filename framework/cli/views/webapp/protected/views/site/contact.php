<?php
/* @var $this SiteController */
/* @var $form ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($form); ?>

	<div class="row">
		<?php echo $form->labelEx($form,'name'); ?>
		<?php echo $form->textField($form,'name'); ?>
		<?php echo $form->error($form,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($form,'email'); ?>
		<?php echo $form->textField($form,'email'); ?>
		<?php echo $form->error($form,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($form,'subject'); ?>
		<?php echo $form->textField($form,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($form,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($form,'body'); ?>
		<?php echo $form->textArea($form,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($form,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($form,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($form,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($form,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>