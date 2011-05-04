<?php

/**
 * acTag form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acTagForm extends BaseacTagForm {

    protected function removeFields() {
        unset($this['actualites_list']);
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText()
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'nom' => new sfValidatorText()
        ));
    }

}
