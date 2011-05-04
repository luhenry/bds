<h2>Bonjour <?php echo $user ?></h2><br/>

Entrer votre nouveau mot de passe dans le formulaire suivant<br/>

<form action="<?php echo url_for('@sf_guard_forgot_password_change?unique_key=' . $sf_request->getParameter('unique_key')) ?>" method="POST">
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td><input type="submit" name="change" value="<?php echo __('Change', null, 'sf_guard') ?>" /></td>
            </tr>
        </tfoot>
    </table>
</form>