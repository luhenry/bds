<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <form action="<?php echo url_for('ml_weekmail_components_' . $sf_request->getParameter('file')) ?>" method="post" >
                <?php if ($form->hasErrors()) : ?>
                    <?php echo $form->renderGlobalErrors() ?>
                <?php endif ?>

                <table>
                    <tbody>
                        <?php echo $form ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td/>
                            <td><input type="submit" value="Enregistrer" /></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</div>