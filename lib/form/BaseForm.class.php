<?php

/**
 * Base project form.
 * 
 * @package    BDS
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony {

    public function setWidgets(array $widgets) {
        foreach ( $widgets as $key => $widget )
            $this->setWidget($key, $widget);

        return $this;
    }

    public function setValidators(array $validators) {
        foreach ( $validators as $key => $validator )
            $this->setvalidator($key, $validator);

        return $this;
    }

    public function configure() {
        $this->configureWidgets();
        $this->configureValidators();
        $this->removeFields();
        $this->configureRelations();
    }

    protected function removeFields() {

    }

    protected function configureWidgets() {

    }

    protected function configureValidators() {

    }

    protected function configureRelations() {

    }

}
