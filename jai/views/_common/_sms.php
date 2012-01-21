<p>
    <?php
    echo CHtml::label('Mensagem', 'sms'), CHtml::textField('sms', null, array('maxlength' => '140'));
    ?>
</p>
<p>
    <?php
    echo CHtml::link('Enviar', 'javascript:;'), CHtml::link('Cancelar', 'javascript:;');
    ?>
</p>
<span class="info">Limite de 140 caracteres.</p>
<?php
echo CHtml::hiddenField('idClienteSms');