<?php $sf_response->setTitle('BDS - ' . $sport . ' - Administration') ?>

<?php echo link_to('< Retourner au sport', 'sport_show', $sport) ?>

<?php include_partial('composant/form', array('form' => $form, 'action' => url_for('sport_admin', $sport), 'widgets' => array('nom', 'description', 'materiel', 'co_cotisants_list'))) ?>