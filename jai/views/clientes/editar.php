<?php

$this->breadcrumbs = array(
    'Clientes' => array('clientes/index'),
    ($cliente->isnewRecord ? 'Adicionar' : 'Editar dados de <span class="desc">' . $cliente->nome . '</span>')
);

echo $this->renderPartial('_form', array('cliente' => $cliente));