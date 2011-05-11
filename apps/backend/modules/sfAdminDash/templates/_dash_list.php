<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
?>

<div class="cpanel" style="border:0">
    <?php foreach ($items as $key => $item): ?>
        <?php if (sfAdminDash::hasPermission($item, $sf_user)):?>
            <li>
                <div class="icon">
                    <a href="<?php echo url_for($item['url']) ?>" title="<?php echo __($item['name']); ?>" style="background:none;padding-left:0;margin:3px 0px">
                        <?php echo image_tag($item['image'], array('alt' => __($item['name']))); ?>
                        <span><?php echo __($item['name']); ?></span>
                    </a>
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="clear"></div>
</div>