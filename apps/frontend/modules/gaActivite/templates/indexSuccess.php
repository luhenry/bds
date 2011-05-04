<?php $sf_response->setTitle('BDS - Les grandes activités') ?>
<?php use_stylesheet('gas.css') ?>

<h1>Les grandes activités</h1>
<?php if ( $activites->count() > 0 ) : ?>
    <div class="lst_gas">
        <?php foreach ($activites as $activite) : ?>
            <?php include_partial('gaActivite/activite', array('activite' => $activite)) ?>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <br/>Aucune grande activité pour le moment
<?php endif ?><br/><br/>

<div style="float:right">
    Design by Renaud Joly (Jumper)
</div><br/>