<?php $sf_response->setTitle('BDS - Les sports') ?>
<?php use_stylesheet('sports.css') ?>

<h1>Les sports actifs ce semestre <span style="font-weight:normal;font-size:15px;float:right">Trier par : <?php echo link_to('nom', '@sports?trier-par=nom') ?>, <?php echo link_to('jour', '@sports?trier-par=jour') ?></span></h1>

<?php $count = count($sportsDuJour) ?>
<?php if ($count > 0) : ?>
    <h2>Au programme aujourd'hui</h2>

    <div class="lst_sports">
        <?php foreach ($sportsDuJour as $sport) : ?>
            <?php include_partial('spSport/sport', array('sport' => $sport, 'horaire' => count($sport['horaires']) > 0 ? $sport['horaires'][0] : null)) ?>
        <?php endforeach ?>

        <div class="clear" ></div>
    </div><br/><br/>
<?php endif ?>

<?php $count = count($sportsDeLaSemaine) ?>
<?php if ($count > 0) : ?>
    <h2>Le reste de la semaine</h2>

    <div class="lst_sports">
        <?php foreach ($sportsDeLaSemaine as $sport) : ?>
            <?php include_partial('spSport/sport', array('sport' => $sport, 'horaire' => count($sport['horaires']) > 0 ? $sport['horaires'][0] : null)) ?>
        <?php endforeach ?>

        <div class="clear" ></div>
    </div><br/><br/>
<?php endif ?>

<?php $count = count($inactifs) ?>
<?php if ($count > 0) : ?>
    <h1>Les sports inactifs ce semestre</h1><br/>
    <?php for ($i = 0 ; $i < $count - 1 ; $i++) : ?>
        <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?>,&nbsp;
    <?php endfor ?>
    <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?><br/><br/>
<?php endif ?>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>
