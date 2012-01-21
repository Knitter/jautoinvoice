<?php

$this->renderPartial('_form-veiculo', array(
    'veiculo' => $veiculo,
    'combustiveis' => $combustiveis,
    'categorias' => $categorias,
    'modelos' => $modelos
));
