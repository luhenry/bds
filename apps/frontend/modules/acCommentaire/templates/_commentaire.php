Ecrit par <?php include_partial('coCotisant/linkTo', array('cotisant' => $commentaire->getCoCotisant())) ?>&nbsp;
le <?php echo format_date($commentaire->getUpdatedAt(), 'D') ?>&nbsp;
à <?php echo format_date($commentaire->getUpdatedAt(), 't') ?>

<?php if ( $sf_user->isAuthenticated() && $commentaire->getCotisantId() === $sf_user->getId() ) : ?>
    <span style="float:right">
        <a href="<?php echo url_for('commentaire_edit', $commentaire) ?>" ><img src="/sfDoctrinePlugin/images/edit.png" alt="editer le commentaire" /></a>
        <a href="<?php echo url_for('commentaire_delete', $commentaire) ?>"><img src="/sfDoctrinePlugin/images/delete.png" alt="supprimer le commentaire"/></a>
    </span><br/>
<?php endif ?>
    
<p style="margin:15px"><?php echo parse_bbcode($commentaire->getContenu()) ?></p>
