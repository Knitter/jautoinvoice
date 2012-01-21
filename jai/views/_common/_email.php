<p>
    <?php
    echo CHtml::label('Assunto', 'assunto'), CHtml::textField('assunto', null, array());
    ?>
</p>

<p>
    <?php
    echo CHtml::label('Mensagem', 'mensagem'), CHtml::textArea('mensagem', null, array());
    ?>
</p>
<p>
    <?php
    echo CHtml::link('Enviar', 'javascript:;'), CHtml::link('Cancelar', 'javascript:;');
    ?>
</p>
<?php
echo CHtml::hiddenField('idClienteEmail');