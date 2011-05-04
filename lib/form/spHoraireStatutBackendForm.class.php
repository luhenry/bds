<?php

/**
 * backendSpHoraireStatutForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spHoraireStatutBackendForm extends spHoraireStatutForm {

    public function removeFields() {
        unset($this['id']);
    }

    public function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'couleur' => new dcWidgetFormColorPicker()
        ));
    }

    public function configureValidators() {
        $this->setValidators(array(
            'couleur' => new dcValidatorColorPicker(),
            'nom' => new sfValidatorText()
        ));
    }

}