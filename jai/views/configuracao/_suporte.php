<p>Caso tenha uma chave de suporte deverá colocá-la neste campo. Não partilhe a sua chave de suporte.</p>

<div class="linha">
    <?php
    echo CHtml::label('Chave de Suporte', 'suporte_chave'),
    CHtml::textField('suporte_chave', $config->suporte_chave, array('class' => 'medium-field'));
    ?>
</div>