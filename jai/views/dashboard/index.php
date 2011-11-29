<?php

$this->menu = array(
    'links' => array(
        array(
            'url' => $this->createUrl('/folhasobra'),
            'icon' => 'assets/images/icons/x32-folhaobra.png',
            'label' => 'Folhas de Obra'
        ),
        array(
            'url' => $this->createUrl('/clientes'),
            'icon' => 'assets/images/icons/x32-cliente.png',
            'label' => 'Clientes'
        ),
        array(
            'url' => $this->createUrl('/veiculos'),
            'icon' => 'assets/images/icons/x32-veiculo.png',
            'label' => 'Veículos'
        ),
        array(
            'url' => $this->createUrl('/marcacoes'),
            'icon' => 'assets/images/icons/x32-marcacoes.png',
            'label' => 'Marcações'
        ),
        array(
            'url' => $this->createUrl('/fornecedores'),
            'icon' => 'assets/images/icons/x32-fornecedor.png',
            'label' => 'Fornecedores'
        ),
        array(
            'url' => $this->createUrl('/funcionarios'),
            'icon' => 'assets/images/icons/x32-funcionario.png',
            'label' => 'Funcionários'
        ),
        array(
            'url' => $this->createUrl('/configuracoes'),
            'icon' => 'assets/images/icons/x32-configuracoes.png',
            'label' => 'Configurações'
        ),
        array(
            'url' => $this->createUrl('site/sair'),
            'icon' => 'assets/images/icons/x32-sair.png',
            'label' => 'Sair'
        )
    )
);