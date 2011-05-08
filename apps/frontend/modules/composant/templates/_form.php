<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $form = $sf_data->getRaw('form') ?>

<form action="<?php echo $sf_data->getRaw('action') ?>" method="post" >
    <?php if (isset($sf_method) && $sf_method === 'put') : ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        
    <?php if ($form->hasErrors()) : ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif ?>

    <?php foreach ($widgets as $widget) : ?>
        <div class="field">
            <span class="label"><?php echo $form[$widget]->renderLabel() ?> :</span>
            <div class="widget">
                <?php if ($form[$widget]->hasError()) : ?>
                    <div class="error"><?php echo $form[$widget]->renderError() ?></div>
                <?php endif ?>
                <?php echo $form[$widget]->render() ?>
            </div>
        </div>
    <?php endforeach ?>

    <?php echo $form->renderHiddenFields() ?>

    <div style="text-align:center">
        <input type="submit" value="<?php echo isset($submit) ? $submit : 'Mettre à jour' ?>" class="submit"/>
    </div>
</form>