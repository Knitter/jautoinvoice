<?php

$this->breadcrumbs = array(
    'Fornecedores' => array('fornecedores/index'),
    ($fornecedor->isnewRecord ? 'Adicionar' : 'Editar dados de <span class="desc">' . $fornecedor->nome . '</span>')
);

echo $this->renderPartial('_form', array('fornecedor' => $fornecedor));