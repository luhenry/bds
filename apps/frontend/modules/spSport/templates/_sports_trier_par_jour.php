<a href="#lundi">Lundi</a>, <a href="#mardi">Mardi</a>, <a href="#mercredi">Mercredi</a>, <a href="#jeudi">Jeudi</a>, <a href="#vendredi">Vendredi</a>, <a href="#samedi">Samedi</a>, <a href="#dimanche">Dimanche</a><br/><br/>

<?php if ($horaires->count() > 0 ) : ?>
    <?php foreach ($horaires as $horaire) : ?>
        <?php if (!isset($jour) || $horaire->getJour() !== $jour) : ?>
            <?php if (isset($jour)) : ?>
                    <div class="clear" ></div>
                </div><br/>
            <?php endif ?>

            <?php $jour = $horaire->getJour() ?>
            <a name="<?php echo strtolower(get_jour($jour)) ?>"></a>
            <h2><?php echo get_jour($jour) ?></h2>
            <div class="lst_sports">
        <?php endif ?>
        <?php include_partial('spSport/sport', array('sport' => $horaire->getSport(), 'horaire' => $horaire)) ?>
    <?php endforeach ?>
        <div class="clear" ></div>
    </div>
<?php endif ?>