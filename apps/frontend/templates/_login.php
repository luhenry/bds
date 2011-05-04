<?php if ($sf_user->isAuthenticated()) : ?>
    <strong class="greeting">Bonjour <?php echo $sf_user->getGuardUser()->getPrenom() ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="/images/compte.png" alt="Mon compte" />
    <a style="color:#FFFFFF" href="<?php echo url_for('cotisant_show', $sf_user->getGuardUser()) ?>">Mon compte</a>&nbsp;&nbsp;&nbsp;
    <img src="/images/connection.png" alt="Déconnexion" />
    <a style="color:#FFFFFF" href="<?php echo url_for('sf_guard_signout') ?>">Déconnexion</a>
<?php else : ?>
        <strong class="greeting">Vous êtes actuellement déconnecté.</strong>&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="/images/connection.png" alt="Connexion" /><a style="color : #FFFFFF;" href="<?php echo url_for('sf_guard_signin') ?>">Connexion</a>
<?php endif ?>