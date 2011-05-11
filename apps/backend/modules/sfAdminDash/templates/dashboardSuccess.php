<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
  /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>
                       
<div id="sf_admin_container">
    <?php if (count($categories)): ?>
        <?php foreach ($categories as $name => $category): ?>
            <?php if (sfAdminDash::hasPermission($category, $sf_user)): ?>
                <div style="float:left;margin-right:20px">
                    <h2><?php echo __(isset($category['name']) ? $category['name'] : $name, null, 'sf_admin_dash'); ?></h2>
                    <ul style="">
                        <?php include_partial('dash_list', array('items' => $category['items'])); ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <div style="clear:both"></div>
    <?php endif; ?>
</div>