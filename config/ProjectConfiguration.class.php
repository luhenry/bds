<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {
        $this->enablePlugins(array(
            'sfDoctrinePlugin',
            'sfDoctrineGuardPlugin',
            'sfFormExtraPlugin',
            'sfThumbnailPlugin',
            'dcWidgetColorPickerPlugin',
            'sfEasyGMapPlugin',
            'sfAdminDashPlugin',
            'sfDoxygenPlugin'
        ));

        set_include_path(realpath(sfConfig::get('sf_lib_dir') . '/vendor/minify/min/lib/') . PATH_SEPARATOR . get_include_path());
    }

}