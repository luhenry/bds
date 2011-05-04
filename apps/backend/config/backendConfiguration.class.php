<?php

class backendConfiguration extends sfApplicationConfiguration {

    protected $zendLoaded = false;

    public function configure() {
        $this->registrerZend();
    }

    public function registrerZend() {
        if ($this->zendLoaded)
            return;

        set_include_path(realpath(sfConfig::get('sf_lib_dir') . '/vendor/') . PATH_SEPARATOR . get_include_path());

        require_once 'Zend/Loader/Autoloader.php';

        Zend_Loader_Autoloader::getInstance();

        $this->zendLoaded = true;
    }

}
