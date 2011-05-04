Entrer votre nouveau mot de passe dans le formulaire suivant<br/><br/>

<form action="<?php echo url_for('cotisant_change_password', array('slug' => $user->getSlug())) ?>" method="POST">
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td><input type="submit" name="change" value="Changer le mot de passe" /></td>
            </tr>
        </tfoot>
    </table>
</form>