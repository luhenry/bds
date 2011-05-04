<?php $sf_response->setTitle('BDS - ' . $activite . ' - Administration') ?>

<?php echo link_to('< Retourner à la grande activité', 'activite_show', $activite) ?>

<?php include_partial('composant/form', array('form' => $form, 'action' => url_for('activite_admin', $activite), 'widgets' => array('nom', 'description', 'contact_id', 'lieu', 'site', 'date_debut', 'date_fin', 'co_cotisants_list'))) ?>