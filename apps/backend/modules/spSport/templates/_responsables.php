<?php if (($responsables =  $sf_data->getRaw('sp_sport')->getResponsables())) : ?>
    <?php for ( $i = 0, $count = count($responsables) ; $i < $count - 1 ; $i++ ) : ?>
        <?php echo $responsables[$i]->getCoCotisant() ?>,&nbsp;
    <?php endfor ?>

    <?php echo $responsables[$i]->getCoCotisant() ?>
<?php endif ?>