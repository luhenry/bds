<?php use_helper('GMap') ?>
<?php use_javascript('jquery.js') ?>
<?php use_javascript('jquery.megamenu.min.js') ?>
<?php use_stylesheet('jquery.megamenu.css') ?>

<?php slot('title') ?>
    BDS - <?php echo $sport ?>
<?php end_slot() ?>

<?php if ($sf_user->isAuthenticated() && ($sport->isAdmin($sf_data->getRaw('sf_user')->getGuardUser()) || $sf_user->isSuperAdmin())) : ?>
    <?php include_partial('composant/local_navigation', array('menus' => array(
            link_to('Modification', 'sport_admin', $sport) => false,
            link_to('E-mail', 'sport_mail', $sport) => array(
                link_to('Envoyer un e-mail', 'sport_mail', $sport),
                link_to('Mailing list', 'sport_mailing_list', $sport)
            )
    ))) ?>
<?php endif ?>

<?php if ( $sport->getIsActif() === false ) : ?>
    <h3>Ce sport est inactif ce semestre</h3><br/><br/>
<?php endif ?>

<h1><?php echo $sport->getNom() ?></h1>

<?php if ($sf_user->isAuthenticated()) : ?>
    <a href="<?php echo url_for('sport_participe', $sport) ?>" id="participe">
        <?php echo $sport->isParticipating($sf_data->getRaw('sf_user')->getGuardUser()) ? 'Ne plus participer à ce sport' : 'Participer à ce sport' ?>
    </a><br/>
<?php else : ?>
    <br/>
<?php endif ?>

<h2>Description</h2><br/>
<?php echo $sport->getDescription() ?><br/><br/>

<?php if ( $sport->getMateriel() !== null && trim($sport->getMateriel()) !== '' ) : ?>
    <h2>Matériel</h2><br/>
    <?php echo $sport->getMateriel() ?><br/><br/>
<?php endif ?>

<?php if ($sport->isActif() ) : ?>
    <h2>Horaires</h2><br/>
    <?php if ( $sport->getHoraires()->count() > 0 ) : ?>
        <table>
            <tr>
                <td>
                    <?php include_map($map, array('height' => '400px')); ?>
                    <?php include_map_javascript($map); ?>
                </td>
                <td style="vertical-align:top;padding-left:10px">
                    <?php foreach ( $sport->getHoraires() as $horaire ) : ?>
                        <i>Horaire :</i> <?php echo get_jour($horaire->getJour()), ' - ', format_date($horaire->getHeureDebut(), 't'), ' à ', format_date($horaire->getHeureFin(), 't') ?><br/>
                        <i>Salle :</i> <?php echo $horaire->getSalle()->getNom() ?><br/>
                        <i>Adresse :</i> <?php echo $horaire->getSalle()->getAdresse() ?>, <?php echo $horaire->getSalle()->getVille() ?><br/><br/>
                    <?php endforeach ?>
                </td>
            </tr>
        </table>
    <?php else : ?>
        Aucun horaire pour ce sport
    <?php endif ?><br/><br/>

    <?php if ( count($responsables) > 0 ) : ?>
        <h2><?php echo format_number_choice('[1]Responsable|[2,+Inf]Responsables', array(), count($responsables)) ?></h2><br/>
        <?php include_partial('coCotisant/galerie', array('cotisants' => $responsables)) ?><br/><br/>
    <?php endif ?>

    <?php if ( count($participants) > 0 ) : ?>
        <h2><?php echo format_number_choice('[1]Participant|[1,+Inf]Participants', array(), count($participants)) ?></h2><br/>
        <?php include_partial('coCotisant/galerie', array('cotisants' => $participants)) ?><br/><br/>
    <?php endif ?>
<?php endif ?>

<?php if ( $sport->getPhotos()->count() > 0 ) : ?>
    <h2><?php echo format_number_choice('[1]Photo|[1,+Inf]Photos', array(), $sport->getPhotos()->count()) ?></h2><br/>
    <?php include_partial('phPhoto/galerie', array('photos' => $sport->getPhotos())) ?><br/><br/>
<?php endif ?>