<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo $action ?>" method="post" >
    <?php if ( !$form->getObject()->isNew() ): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <?php if ( $form->hasErrors() ) : ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif ?>

    <?php echo $form['contenu']->renderError() ?>
    <?php echo $form['contenu']->render() ?><br/>
    <?php echo $form->renderHiddenFields(false) ?>

    <div style="width:580px;text-align:center">
        <input type="submit" value="Poster" />
    </div>
</form>
