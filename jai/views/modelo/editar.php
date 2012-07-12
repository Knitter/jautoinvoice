<?php $this->titulo = $modelo->isNewRecord ? 'Criar Modelo de Veículo' : 'Editar ' . $modelo->nome; ?>

<div id="titulo">
    <h2><?php echo $modelo->isNewRecord ? 'Criar' : 'Editar'; ?> Modelo</h2>

    <?php if (count($marcas)) { ?>
        <div id="opcoes">
            <?php
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png'), $this->createUrl('modelo/index'), array('class' => 'voltar')),
            CHtml::link(CHtml::image(Yii::app()->baseUrl . '/recursos/imagens/icones/modelo-adicionar.png'), $this->createUrl('modelo/adicionar'), array('class' => 'adicionar'));
            ?>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>

<?php
if (count($marcas)) {
    $this->renderPartial('_form', array('modelo' => $modelo, 'marcas' => $marcas));
} else {
    ?>
    <p>Não existem marcas de veículos criadas. Não é possível criar modelos sem que existam marcas para associar.</p>
    <p>Comece por criar <a href="<?php echo $this->createUrl('marca/adicionar'); ?>">marcas de veículos</a>.</p>
<?php
}