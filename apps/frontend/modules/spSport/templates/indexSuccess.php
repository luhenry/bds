<?php $sf_response->setTitle('BDS - Les sports') ?>
<?php use_stylesheet('sports.css') ?>

<h1>
    Les sports actifs ce semestre
</h1>

<div style="float:right">
    <form method="get">
        <span style="font-size:15px">
            Trier par : <?php echo link_to('nom', '@sports?trier-par=nom') ?>, <?php echo link_to('jour', '@sports?trier-par=jour') ?>&nbsp;&nbsp;&nbsp;
            <?php echo $form['recherche']->renderLabel() ?> : <?php echo $form['recherche']->render() ?>
        </span>
        
    </form>
</div>

<?php if ($sf_request->getParameter('trier-par') === 'nom') : ?>
    <div style="clear:both"></div>
    <?php include_component('spSport', 'sportsTrierParNom', array(
        'sf_cache_key' => 'sportsTrierParNom' . ($sf_request->hasParameter('recherche') ? '_recherche=' . $sf_request->getParameter('recherche') : '')
    )) ?>
<?php else : ?>
    <?php include_component('spSport', 'sportsTrierParJour', array(
        'sf_cache_key' => 'sportsTrierParJour' . ($sf_request->hasParameter('recherche') ? '_recherche=' . $sf_request->getParameter('recherche') : '')
    )) ?>
<?php endif ?><br/>

<h1>Les sports inactifs ce semestre</h1>
<?php for ($count = count($inactifs), $i = 0 ; $i < $count - 1 ; $i++) : ?>
    <?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?>,&nbsp;
<?php endfor ?>
<?php echo link_to($inactifs[$i], 'sport_show', $inactifs[$i]) ?><br/><br/>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>