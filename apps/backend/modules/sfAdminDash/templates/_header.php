<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
  /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
  /** @var string|null Link to the module (for breadcrumbs) */ $module_link = $sf_data->getRaw('module_link');
  /** @var string|null Link to the action (for breadcrumbs) */ $action_link = $sf_data->getRaw('action_link');
?>

<?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential(sfAdminDash::getProperty('credentials'))): ?>
    <div id='sf_admin_theme_header'>
        <a href='<?php echo url_for('homepage') ?>'>
            <?php echo image_tag(sfAdminDash::getProperty('web_dir').'/images/header_text', array('alt' => 'Home')); ?>
        </a>
    </div>

    <div id='sf_admin_menu'>
        <?php include_partial('sfAdminDash/menu', array('items' => $items, 'categories' => $categories)); ?>

        <div id="logout">
            <a href="/<?php echo ( $env = $sf_context->getConfiguration()->getEnvironment() ) && $env !== 'prod' ? 'frontend_' . $env : 'index' ?>.php" >Frontend</a>
        </div>
        <div class="clear" />
    </div>
<?php endif ?>