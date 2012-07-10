<?php $this->titulo = $funcionario->isNewRecord ? 'Criar Funcionário' : 'Editar ' . $funcionario->nome; ?>

<div id="titulo">
    <h2><?php echo $funcionario->isNewRecord ? 'Criar' : 'Editar'; ?> Funcionário</h2>
    
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('funcionario/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/empregado-adicionar.png'), $this->createUrl('funcionario/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('funcionario' => $funcionario));