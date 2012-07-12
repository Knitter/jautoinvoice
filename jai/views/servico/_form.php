<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'servico-form',
    'enableAjaxValidation' => true,
    'focus' => array($servico, 'nome')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($servico, 'nome'),
        $form->textField($servico, 'nome', array('class' => 'long-field', 'maxlength' => 255)),
        $form->error($servico, 'nome');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($servico, 'preco'),
        $form->textField($servico, 'preco', array('class' => 'small-field')), '&nbsp;&euro;',
        $form->error($servico, 'preco');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($servico, 'descricao'),
        $form->textArea($servico, 'descricao', array('rows' => 5, 'cols' => 76)),
        $form->error($servico, 'descricao');
        ?>
    </div>

    <div class="linha">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('servico/index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();