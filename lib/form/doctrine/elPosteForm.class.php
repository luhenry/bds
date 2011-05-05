<?php

/**
 * elPoste form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elPosteForm extends BaseelPosteForm {

    protected function removeFields() {
        unset($this['elections_list'], $this['slug']);
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormEditor()
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'description' => new sfValidatorText()
        ));
    }

}
