<?php $sf_response->setTitle('BDS - ' . $activite) ?>
<?php use_javascript('jquery.js') ?>
<?php use_javascript('jquery.megamenu.js') ?>
<?php use_stylesheet('jquery.megamenu.css') ?>

<?php if ( $sf_user->isAuthenticated() && ( $activite->isAdmin($sf_data->getRaw('sf_user')->getGuardUser()) || $sf_user->isSuperAdmin() )) : ?>
    <?php include_partial('composant/local_navigation', array('menus' => array(
        link_to('Modification', 'activite_admin', $activite) => false
    ))) ?>
<?php endif ?>

<h1><?php echo $activite->getNom() ?></h1><br/>

<h2>Présentation</h2><br/>
<?php echo parse_bbcode($activite->getDescription()) ?><br/><br/>

<h2>Dates</h2><br/>
<i>Début :</i> <?php echo format_date($activite->getDateDebut(), 'D'), ' à ', format_date($activite->getDateDebut(), 't') ?><br/>
<i>Fin :</i> <?php echo format_date($activite->getDateFin(), 'D'), ' à ', format_date($activite->getDateFin(), 't') ?><br/><br/>


<?php if ( $activite->getCoCotisants()->count() > 0 ) : ?>
    <h2>Participants (<?php echo $activite->getCoCotisants()->count() ?>)</h2><br/>
    <?php include_partial('coCotisant/galerie', array('cotisants' => $activite->getCoCotisants())) ?><br/><br/>
<?php endif ?>

<?php if ( $activite->getPhPhotos()->count() > 0 ) : ?>
    <h2>Photos (<?php echo $activite->getPhPhotos()->count() ?>)</h2><br/>
    <?php include_partial('phPhoto/galerie', array('photos' => $activite->getPhPhotos())) ?><br/><br/>
<?php endif ?>