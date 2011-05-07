<!--[if lte IE 6]>
    <script type="text/javascript">
        sfHover = function() {
                var sfEls = document.getElementById("menu").getElementsByTagName("LI");
                for (var i=0; i<sfEls.length; i++) {
                        sfEls[i].onmouseover=function() {
                                this.className+=" sfhover";
                        }
                        sfEls[i].onmouseout=function() {
                                this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
                        }
                }
        }

        if (window.attachEvent)
            window.attachEvent("onload", sfHover);
    </script>
<![endif]-->


<div id="page_navigation">
    <ul>
        <?php foreach ($sf_data->getRaw('menus') as $key => $menu) : ?>
            <li>
                <?php echo $key ?>
                <?php if (is_array($menu)) : ?>
                    <ul>
                        <?php foreach ($menu as $ssmenu) : ?>
                            <li><?php echo $ssmenu ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>