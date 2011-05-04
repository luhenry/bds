<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('activite_mailing') ?>" method="post" >
    <?php if ($form->hasErrors()) : ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif ?>

        <table style="width:100%">
            <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td/>
                <td><input type="submit" value="Envoyer" /></td>
            </tr>
        </tfoot>
    </table>
</form>