<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    protected $zendLoaded = false;

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

        set_include_path(
                realpath(sfConfig::get('sf_lib_dir') . '/vendor/minify/min/lib/') . PATH_SEPARATOR .
                realpath(sfConfig::get('sf_lib_dir') . '/vendor/') . PATH_SEPARATOR .
                get_include_path()
        );

        $this->registrerZend();
    }

    public function registrerZend() {
        if ($this->zendLoaded)
            return;

        require_once 'Zend/Loader/Autoloader.php';

        Zend_Loader_Autoloader::getInstance();

        $this->zendLoaded = true;
    }

}