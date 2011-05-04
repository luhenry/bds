<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <!-- <link rel="shortcut icon" href="/favicon.ico" /> -->
    </head>
    <body>
        <?php include_component('sfAdminDash', 'header'); ?>
        <div id="content"><?php echo $sf_content ?></div>
        <?php include_partial('sfAdminDash/footer'); ?>
    </body>
</html>
