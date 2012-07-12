<?php
$this->titulo = $fornecedor->isNewRecord ? 'Criar Fornecedor' : 'Editar ' . $fornecedor->nome;
?>

<div id="titulo">
    <h2><?php echo $fornecedor->isNewRecord ? 'Criar' : 'Editar'; ?> Fornecedor</h2>
    
    <div id="opcoes">
        <?php
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('fornecedor/index'), array('class' => 'voltar')),
        CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/fornecedor-adicionar.png'), $this->createUrl('fornecedor/adicionar'), array('class' => 'adicionar'));
        if (!$fornecedor->isNewRecord && $fornecedor->email != null) {
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/email.png'), 'javascript:caixaEmail(' . $fornecedor->idFornecedor . ')');
        }
        ?>
    </div>
    <div class="clear"></div>
</div>

<?php
$this->renderPartial('_form', array('fornecedor' => $fornecedor));

$this->renderPartial('//_comum/_email', array('url' => $this->createUrl('fornecedor/email')));