<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'veiculo-form',
    'enableAjaxValidation' => true,
    'focus' => array($veiculo, 'matricula')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'matricula'),
        $form->textField($veiculo, 'matricula'),
        $form->error($veiculo, 'matricula');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'dataRegisto');

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'attribute' => 'dataRegisto',
            'model' => $veiculo
        ));

        echo $form->error($veiculo, 'dataRegisto');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'idCategoria'),
        $form->dropDownList($veiculo, 'idCategoria'
                , CHtml::listData($categorias, 'idCategoria', 'nome')
                , array('empty' => '- escolha uma categoria-')),
        $form->error($veiculo, 'idCategoria');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'idCombustivel'),
        $form->dropDownList($veiculo, 'idCombustivel'
                , CHtml::listData($combustiveis, 'idCombustivel', 'nome')
                , array('empty' => '- escolha um combustível -')),
        $form->error($veiculo, 'idCombustivel');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'idModelo'),
        $form->dropDownList($veiculo, 'idModelo'
                , CHtml::listData($modelos, 'idModelo', 'nome', 'marca.nome')
                , array('empty' => '- escolha um modelo -')),
        $form->error($veiculo, 'idModelo');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'nrChassis'),
        $form->textField($veiculo, 'nrChassis', array('size' => 25, 'maxlength' => 25)),
        $form->error($veiculo, 'nrChassis');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'cilindrada'),
        $form->textField($veiculo, 'cilindrada', array('size' => 25, 'maxlength' => 25)),
        $form->error($veiculo, 'cilindrada');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'nrMotor'),
        $form->textField($veiculo, 'nrMotor', array('size' => 25, 'maxlength' => 25)),
        $form->error($veiculo, 'nrMotor');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($veiculo, 'notas'),
        $form->textArea($veiculo, 'notas', array('rows' => 5, 'cols' => 76)),
        $form->error($veiculo, 'notas');
        ?>
    </div>

    <div class="linha accoes">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('veiculo/lista', array('id' => $cliente->idCliente, 'op' => $op)), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();