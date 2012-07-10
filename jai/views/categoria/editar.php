<?php $this->titulo = $categoria->isNewRecord ? 'Criar Categoria de Veículo' : 'Editar' . $categoria->nome; ?>
<div id="titulo">
    <h2><?php echo $categoria->isNewRecord ? 'Criar' : 'Editar'; ?> Categoria</h2>
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('categoria/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/categoria-adicionar.png'), $this->createUrl('categoria/adicionar'), array('class' => 'adicionar'));
        ?>
    </div>
    <div style="clear: both"></div>
</div>
<?php
$this->renderPartial('_form', array('categoria' => $categoria));