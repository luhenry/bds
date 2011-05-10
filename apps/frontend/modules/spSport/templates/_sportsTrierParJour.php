<?php $count = $horaires->count() ?>
<?php for ($i = 0; $i < $count; ) : ?>
    <?php $jour = $horaires[$i]->getJour() ?>
    <a name="<?php echo strtolower(get_jour($jour)) ?>"></a>
    <h2><?php echo get_jour($jour) ?></h2>
    <div class="lst_sports">
        <?php for (; $i < $count && $horaires[$i]->getJour() === $jour; $i++) : ?>
            <?php include_partial('spSport/sport', array('sport' => $horaires[$i]->getSport(), 'horaire' => $horaires[$i])) ?>
        <?php endfor ?>
    </div>
    <div class="clear" ></div><br/>
<?php endfor ?>