<h1>Module Generator</h1>

<p>This generator helps you to generate the skeleton code needed by a Yii module.</p>

<?php $form=$this->beginWidget('CCodeForm', array('model'=>$form)); ?>

	<div class="row">
		<?php echo $form->labelEx($form,'moduleID'); ?>
		<?php echo $form->textField($form,'moduleID',array('size'=>65)); ?>
		<div class="tooltip">
			Module ID is case-sensitive. It should only contain word characters.
			The generated module class will be named after the module ID.
			For example, a module ID <code>forum</code> will generate the module class
			<code>ForumModule</code>.
		</div>
		<?php echo $form->error($form,'moduleID'); ?>
	</div>

<?php $this->endWidget(); ?>
