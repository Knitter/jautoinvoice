<?php $this->titulo = $material->isNewRecord ? 'Criar Material' : 'Editar ' . $material->referencia; ?> 

<div id="titulo">
    <h2><?php echo $material->isNewRecord ? 'Criar' : 'Editar'; ?> Material</h2>

    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('material/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/material-adicionar.png'), $this->createUrl('material/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div class="clear"></div>
</div>
<?php
$this->renderPartial('_form', array('material' => $material, 'ivas' => $ivas, 'fornecedores' => $fornecedores));