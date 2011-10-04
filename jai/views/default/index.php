<div class="">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true
        ),
            ));
    ?>    
    <p>
        <?php
        echo $form->labelEx($model, 'username'),
        $form->textField($model, 'username'),
        $form->error($model, 'username');
        ?>
    </p>

    <p>
        <?php
        echo $form->labelEx($model, 'password'),
        $form->passwordField($model, 'password'),
        $form->error($model, 'password');
        ?>
    </p>
    <p>
        <?php
        echo $form->checkBox($model, 'rememberMe'),
        $form->label($model, 'rememberMe'),
        $form->error($model, 'rememberMe');
        ?>
    </p>
    <p>
        <?php echo CHtml::submitButton('Entrar'); ?>
    </p>

    <?php $this->endWidget(); ?>
</div>