<?php $this->titulo = 'Contactos'; ?>
<div id="contactos">
    <h2><?php echo $dados->nome; ?></h2>

    <p>Poderá usar um dos meio apresentados abaixo para entrar em contacto com a <?php echo $dados->nome; ?>.</p>

    <?php if ($dados->endereco) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/mail_box.png" /></div>
            <div class="span-19 last"><?php echo $dados->endereco; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->telefone) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/telephone.png" /></div>
            <div class="span-19 last"><?php echo $dados->telefone; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->telemovel) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/phone.png" /></div>
            <div class="span-19 last"><?php echo $dados->telemovel; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->fax) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/fax.png" /></div>
            <div class="span-19 last"><?php echo $dados->fax; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->email) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/contact_email.png" /></div>
            <div class="span-19 last"><?php echo $dados->email; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->url) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/world_link.png" /></div>
            <div class="span-19 last"><?php echo $dados->url; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->inicio && $dados->fim) { ?>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/clock_select_remain.png" /></div>
            <div class="span-19 last"><?php echo $dados->inicio, ' - ', $dados->fim; ?></div>
        </div>
    <?php } ?>

    <?php if ($dados->latitude && $dados->longitude) { ?>
        <p>Quer através do mapa quer através das coordenadas GPS poderá facilmente encontrar as instalações da <?php echo $dados->nome; ?>.</p>
        <div class="linha">
            <div class="prepend-3 span-1 append-1"><img src="<?php echo Yii::app()->baseUrl; ?>/recursos/imagens/icones-16/map.png" /></div>
            <div class="span-19 last"><?php echo $dados->latitude, ' / ', $dados->longitude; ?></div>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>