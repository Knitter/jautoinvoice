<h3>Opções de Suporte</h3>
<div class="configuracoes">
    <fieldset>
        <legend>Suporte</legend>
        <div class="row">
            <?php
            echo CHtml::label('Chave', 'chaveSuporte'),
            CHtml::textField('chave', $config->chaveSuporte, array('class' => 'medium-field'));
            ?>
        </div>
    </fieldset>
</div>
