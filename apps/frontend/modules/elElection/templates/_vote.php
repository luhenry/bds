<?php $form = $sf_data->getRaw('form') ?>

<form action="<?php echo url_for('election_vote', $sf_data->getRaw('siege')) ?>" method="post" >
    <?php if ( !$form->getObject()->isNew() ): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <?php echo $form->renderHiddenFields() ?>

    <?php if ($form->hasErrors()) : ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif ?>

    <?php if ($form['liste_id']->hasError()) : ?>
        <?php echo $form['liste_id']->renderError() ?>
    <?php endif ?>

    <?php echo $form['liste_id']->render() ?>

    <input type="submit" value="Voter" class="submit"/>
</form>