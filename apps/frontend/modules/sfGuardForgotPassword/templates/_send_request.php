Bonjour <?php echo $user ?>,<br/><br/>

Cet email vous est envoyé car vous avez demandé à changer de mot de passe?.<br/><br/>

Vous pouvez changer votre mot de passe en cliquant sur le lien suivant qui n'est valide que 24 heures.<br/><br/>

<?php echo link_to('Cliquer pour changer de mot de passe', '@sf_guard_forgot_password_change?unique_key='.$forgot_password->unique_key, 'absolute=true') ?>