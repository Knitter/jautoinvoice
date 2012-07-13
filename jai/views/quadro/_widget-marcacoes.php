<div class="widget ui-corner-bottom">
    <div class="widget-header marcacoes">Marcações</div>
    <div class="widget-body">
        <?php
        if (count($marcacoes)) {
            echo '<ul>';
            foreach ($marcacoes as $marcacao) {
                echo '<li>', $marcacao->dataMarcacao, ($marcacao->idVeiculo ? $marcacao->veiculo->cliente->nome : ''), '</li>';
            }
            echo '</ul>';
        } else {
            ?>
            <em>Sem marcações para os próximos 3 dias.</em>
        <?php } ?>
    </div>
</div>