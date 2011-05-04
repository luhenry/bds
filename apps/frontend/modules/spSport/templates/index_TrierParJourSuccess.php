<?php $sf_response->setTitle('BDS - Les sports') ?>
<?php use_stylesheet('sports.css') ?>

<h1>Les sports actifs ce semestre <span style="font-weight:normal;font-size:15px;float:right">Trier par : <?php echo link_to('nom', '@sports?trier-par=nom') ?>, <?php echo link_to('jour', '@sports?trier-par=jour') ?></span></h1>

<a href="#lundi">Lundi</a>, <a href="#mardi">Mardi</a>, <a href="#mercredi">Mercredi</a>, <a href="#jeudi">Jeudi</a>, <a href="#vendredi">Vendredi</a>, <a href="#samedi">Samedi</a>, <a href="#dimanche">Dimanche</a><br/><br/>

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
</div><br/>

<h1>Les sports inactifs ce semestre</h1><br/>
<?php for ($count = count($inactifs), $i = 0 ; $i < $count - 1 ; $i++) : ?>
    <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?>,&nbsp;
<?php endfor ?>
<?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?><br/><br/>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>