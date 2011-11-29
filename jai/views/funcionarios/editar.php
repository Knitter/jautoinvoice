<?php

$this->breadcrumbs = array(
    'Funcionários' => array('funcionarios/index'),
    ($funcionario->isnewRecord ? 'Adicionar' : 'Editar dados de <span class="desc">' . $funcionario->nome .'</span>')
);

echo $this->renderPartial('_form', array('funcionario' => $funcionario));