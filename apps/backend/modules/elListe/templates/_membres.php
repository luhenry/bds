<?php $membres = $el_liste->getCoCotisants() ?>
<?php $count = $membres->count() ?>

<?php for ($i = 0; $i < $count - 1; $i++) : ?>
    <?php echo $membres[$i] ?>,
<?php endfor ?>
<?php echo $membres[$i] ?>