<div class="widget ui-corner-bottom">
    <div class="widget-header avisos">Avisos</div>
    <div class="widget-body">
        <?php
        if (count($avisos)) {
            echo '<ul>';
            foreach ($avisos as $aviso) {
                echo '<li>', $aviso, '</li>';
            }
            echo '</ul>';
        } else {
            ?>
            <div class="vazio">Sem avisos</div>
        <?php } ?>
    </div>
</div>