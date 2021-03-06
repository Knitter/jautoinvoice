<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'folhaobra-form',
    'enableAjaxValidation' => true,
    'focus' => array($folhaObra, 'matricula')
        ));
?>
<div class="form">
    <div class="linha">
        <?php
        echo $form->labelEx($folhaObra, 'matricula');
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model' => $folhaObra,
            'attribute' => 'matricula',
            'sourceUrl' => $this->createUrl('veiculos/acmatricula'),
            'options' => array(
                'minLength' => '3'
            )
        ));

        echo $form->error($folhaObra, 'matricula');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($folhaObra, 'data');

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $folhaObra,
            'attribute' => 'data'
        ));

        echo $form->error($folhaObra, 'data');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($folhaObra, 'kms'),
        $form->textField($folhaObra, 'kms', array('class' => 'small-field')),
        $form->error($folhaObra, 'kms');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($folhaObra, 'idFuncionario'),
        $form->dropDownList($folhaObra, 'idFuncionario', CHtml::listData($funcionarios, 'idFuncionario', 'nome')),
        $form->error($folhaObra, 'idFuncionario');
        ?>
    </div>

    <div class="linha">
        <?php
        echo $form->labelEx($folhaObra, 'descricaoAvaria'),
        $form->textArea($folhaObra, 'descricaoAvaria', array('linhas' => 5, 'cols' => 76)),
        $form->error($folhaObra, 'descricaoAvaria');
        ?>
    </div>

    <div class="linha">
        <h3>Serviços Prestados</h3>
        <table id="linhasServico">
            <tr>
                <th>Funcionário</th>
                <th>Serviço</th>
                <th class="small-column">Duração (horas)</th>
                <th>Notas</th>
                <th class="small-column">Preço ( &euro; )</th>
                <th class="buttons-2">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/adicionar.png'), 'javascript:;', array(
                        'onclick' => 'adicionarLinhaServico();',
                        'value' => 'javascript:;'
                    ));
                    ?>
                </th>
            </tr>
        </table>
    </div>

    <div class="linha">
        <?php
        echo CHtml::submitButton('Gravar', array(
            'class' => 'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only'
        )),
        CHtml::link('Cancelar', $this->createUrl('folhaobra/index'), array('class' => 'cancelar'));
        ?>
    </div>
</div>
<?php
$this->endWidget();

$this->renderPartial('_linhaServico', array(
    'funcionarios' => $funcionarios,
    'servicos' => $servicos,
    'materiais' => $materiais
));