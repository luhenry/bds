<h2>Oublié votre mot de passe</h2><br/>

<p>Remplissez le formulaire suivant pour recevoir un email contenant des informations pour changer votre mot de passe</p>

<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
        <tr>
            <td><input type="submit" name="change" value="<?php echo __('Request', null, 'sf_guard') ?>" /></td>
        </tr>
    </tfoot>
  </table>
</form>