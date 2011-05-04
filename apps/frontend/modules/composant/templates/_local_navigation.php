<ul class="megamenu" >
    <?php foreach ($sf_data->getRaw('menus') as $key => $menu) : ?>
        <li>
            <?php echo $key ?>
            <?php if (is_array($menu)) : ?>
                <div>
                    <ul>
                        <?php foreach ($menu as $ssmenu) : ?>
                            <li><?php echo $ssmenu ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
        </li>
    <?php endforeach ?>
</ul>
<script type="text/javascript">
    jQuery(function(){
        jQuery(".megamenu").megamenu({justify:"right",mm_timeout:0,show_method:"fadeIn",hide_method:"fadeOut"});
    });
</script>