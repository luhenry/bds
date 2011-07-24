<?php

require_once '/var/www/lib/symfony/lib/autoload/sfCoreAutoload.class.php';
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

        set_include_path(realpath('/var/www/lib/minify/min/lib/') . PATH_SEPARATOR . realpath('/var/www/lib/') . PATH_SEPARATOR . get_include_path());

        $this->registrerZend();
    }

    public function registrerZend() {
        if ($this->zendLoaded)
            return;

        require_once 'Zend/Loader/Autoloader.php';

        Zend_Loader_Autoloader::getInstance();

        $this->zendLoaded = true;
    }

    public function configureDoctrine(Doctrine_Manager $manager) {
//        $manager->setAttribute(Doctrine_Core::ATTR_QUERY_CACHE, new Doctrine_Cache_Apc());
        $manager->setAttribute(Doctrine_Core::ATTR_RESULT_CACHE, new Doctrine_Cache_Apc());
    }

}