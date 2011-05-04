<ul>
    <li <?php echo $current === 'accueil' ? 'class="current"' : '' ?>>
        <?php echo link_to('Accueil', 'homepage') ?>
    </li>
    <li <?php echo $current === 'le_bds' ? 'class="current"' : '' ?>>
        <?php echo link_to('Le BDS', 'information_presentation') ?>
        <ul>
            <li><?php echo link_to('Présentation du BDS', 'information_presentation') ?></li>
            <li><?php echo link_to('Inscription', 'information_inscription') ?></li>
            <li><?php echo link_to('L\'équipe', 'information_equipe') ?></li>
        </ul>
    </li>
    <li <?php echo $current === 'l_actualite' ? 'class="current"' : '' ?>>
        <?php echo link_to('L\'actualité', 'actualites') ?>
    </li>
    <li <?php echo $current === 'les_sports' ? 'class="current"' : '' ?>>
        <?php echo link_to('Les sports', 'sports') ?>
    </li>
    <li <?php echo $current === 'les_grandes_activites' ? 'class="current"' : '' ?>>
        <?php echo link_to('Les grandes activités', 'activites') ?>
    </li>
    <li <?php echo $current === 'nous_contacter' ? 'class="current"' : '' ?>>
        <?php echo link_to('Nous contacter', 'information_contact') ?>
        <ul>
            <li><?php echo link_to('Les adresses', 'information_adresses') ?></li>
            <li><?php echo link_to('Formulaire de contact', 'information_contact') ?></li>
            <li><?php echo link_to('Mentions légales', 'information_mentions_legales') ?></li>
        </ul>
    </li>
    <?php include_component('elElection', 'menu', array('current' => $current)) ?>
    <?php if ( $sf_user->hasCredential('acces_backend') ) : ?>
        <li><a href="/backend<?php echo ( $env = $sf_context->getConfiguration()->getEnvironment() ) && $env !== 'prod' ? '_' . $env : '' ?>.php">Administration</a></li>
    <?php endif ?>
</ul>