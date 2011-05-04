<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>

        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-20456600-3']);
          _gaq.push(['_setDomainName', 'none']);
          _gaq.push(['_setAllowLinker', true]);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    </head>
    <body>
        <div id="fond_d">
            <div id="fond_g">
                <div id="page_top">
                    <div id="design">
                        <div id="header">
                            <div id="login">
                                <?php include_partial('global/login') ?>
                            </div>
                            <a href="<?php echo url_for('homepage') ?>" >
                                <img src="/images/logo.png" alt="Bureau des sports de L'UTBM" />
                            </a>
                        </div>

                        <div id="siteNav"><?php include_component('composant', 'menu') ?></div>

                        <div id="home">
                            <div id="wrapperWit">
                                <div id="shell">
                                    <div id="gooey">
                                        <div id="content">
                                            <?php if ($sf_user->hasFlash('notice') || $sf_user->hasFlash('error')) : ?>
                                                <div id="flash" >
                                                    <?php if ($sf_user->hasFlash('notice')) : ?>
                                                        <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
                                                    <?php endif ?>
                                                    <?php if ($sf_user->hasFlash('error')) : ?>
                                                        <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
                                                    <?php endif ?>
                                                </div>
                                            <?php endif ?>
                                            <?php echo $sf_content ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="footer"><?php include_partial('global/footer') ?></div>
                        <div id="copyright"><?php include_partial('global/copyright') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
