<div class="form login">
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<p>Please enter your password</p>

	<?php echo $form->passwordField($form,'password'); ?>
	<?php echo $form->error($form,'password'); ?>

	<?php echo CHtml::submitButton('Enter'); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
