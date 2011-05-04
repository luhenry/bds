<?php $sf_response->setTitle('BDS - Les sports') ?>
<?php use_stylesheet('sports.css') ?>

<h1>Les sports actifs ce semestre <span style="font-weight:normal;font-size:15px;float:right">Trier par : <?php echo link_to('nom', '@sports?trier-par=nom') ?>, <?php echo link_to('jour', '@sports?trier-par=jour') ?></span></h1>

<div class="lst_sports">
    <?php foreach ($sports as $sport) : ?>
        <?php include_partial('spSport/sport', array('sport' => $sport, 'horaire' => count($sport['horaires']) > 0 ? $sport['horaires'][0] : null)) ?>
    <?php endforeach ?>

    <div class="clear" ></div>
</div><br/><br/>

<h1>Les sports inactifs ce semestre</h1><br/>
<?php for ($count = count($inactifs), $i = 0 ; $i < $count - 1 ; $i++) : ?>
    <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?>,&nbsp;
<?php endfor ?>
<?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?><br/><br/>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>
