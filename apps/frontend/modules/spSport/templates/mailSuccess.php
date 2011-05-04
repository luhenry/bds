<?php echo link_to('< Retourner au sport', 'sport_show', $sport) ?>
<?php include_partial('composant/form', array('form' => $form, 'action' => url_for('sport_mail', $sport), 'widgets' => array('objet', 'destinataires', 'contenu'), 'submit' => 'Envoyer')) ?>

