<?php $this->title = $categoria->isNewRecord ? 'Criar Categoria de Veículo' : 'Editar' . $categoria->nome; ?>
<div id="titulo">
    <h2><?php echo $categoria->isNewRecord ? 'Criar' : 'Editar'; ?> Categoria</h2>
    <div id="opcoes">
        <a href="<?php echo $this->createUrl('/categorias'); ?>"><img src="imagens/icones/voltar.png" /></a>&nbsp;&nbsp;
        <a href="<?php echo $this->createUrl('categorias/criar'); ?>"><img src="imagens/icones/categoria.adicionar.png" /></a>
    </div>
    <div style="clear: both"></div>
</div>
<?php
$this->renderPartial('_form', array('categoria' => $categoria));