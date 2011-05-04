<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>
    
    <table id="connexion">
        <?php if ($form->hasErrors()) : ?>
            <thead>
                <?php foreach ($form->getGlobalErrors() as $error) : ?>
                    <tr>
                        <td/>
                        <td><?php echo __($error->getMessage()) ?></td>
                    </tr>
                <?php endforeach ?>
            </thead>
        <?php endif ?>
        <tbody>
            <tr>
                <td style="text-align:right"><label for="signin_username"><?php echo __('Username or Email') ?>&nbsp;:</label></td>
                <td>
                    <?php if ($form['username']->hasError()) : ?>
                        <?php echo __($form['username']->renderError()) ?>
                    <?php endif ?>
                    <?php echo $form['username']->render() ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:right"><label for="signin_password"><?php echo __('Password') ?>&nbsp;:</label></td>
                <td>
                    <?php if ($form['password']->hasError()) : ?>
                        <?php echo $form['password']->renderErrors() ?>
                    <?php endif ?>
                    <?php echo $form['password']->render() ?>
                </td>
            </tr>
            <tr>
                <td style="text-align:right">
                    <?php if ($form['remember']->hasError()) : ?>
                        <?php echo $form['remember']->renderErrors() ?>
                    <?php endif ?>
                    <?php echo $form['remember']->render() ?>
                </td>
                <td><label for="signin_remember"><?php echo __('Remember') ?></label></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td/>
                <td>
                    <input type="submit" value="<?php echo __('Signin') ?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;padding-top:25px">
                    <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                    <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
                    <?php endif; ?>
                </td>
            </tr>
        </tfoot>
    </table>
</form><br/><br/>

