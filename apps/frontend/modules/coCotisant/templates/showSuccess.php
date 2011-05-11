<h1>Fiche de <?php echo $cotisant ?></h1><br/>

<div style="float:right;margin-right:10px;padding:2px;border:2px solid gray" >
    <img src="/uploads/cotisants/photos/<?php echo $cotisant->getPhoto() ?>" style="max-width:150px;max-height:112px" />
</div>

<h2>Informations personnelles</h2><br/>
<i>Email :</i> <?php echo $cotisant->getEmail() ?><br/><br/>

<div style="clear:both" />

<?php if ( $cotisant->getAcActualites()->count() > 0 ) : ?>
    <h2>Actualités</h2><br/>
    <?php include_component('acActualite', 'flux', array(
        'filters' => array(array('is_visible', '=', true), array('cotisant_id', '=', $cotisant->getId())),
        'message' => array('none' => 'Ce cotisant n\'a pas encore écrit d\'actualité'))) ?><br/>
<?php endif ?>

<?php if ( $cotisant->getSpSports()->count() > 0 ) : ?>
    <h2>Sports</h2><br/>        
    <?php foreach ( $cotisant->getSpSports() as $sport ) : ?>
        <i>Nom :</i> <?php echo link_to($sport, 'sport_show', $sport) ?><br/>
    <?php endforeach ?><br/>
<?php endif ?>

<?php if ( $cotisant->getGaActivites()->count() > 0 ) : ?>
    <h2>Grandes activités</h2><br/>

    <?php foreach ( $cotisant->getGaActivites() as $activite ) : ?>
        <?php if ( $activite->getIsVisible() === true && strtotime($activite->getDateFin()) > time() ) : ?>
            <i>Nom :</i> <?php echo link_to($activite, 'activite_show', $activite) ?><br/><br/>
        <?php endif ?>
    <?php endforeach ?><br/>
<?php endif ?>

<?php if ( $cotisant->getId() === $sf_user->getGuardUser()->getId() ) : ?>
    <h2>Administration de mon compte</h2><br/>
    <?php echo link_to('Changer mon mot de passe', 'cotisant_change_password', array('slug' => $cotisant->getSlug())) ?><br/>
<?php endif ?>