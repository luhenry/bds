<?php

/**
 * backendSpSalleForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spSalleBackendForm extends spSalleForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['latitude'],
                $this['longitude']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'adresse' => new sfWidgetFormInputText(),
            'ville' => new sfWidgetFormInputText(),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'nom' => new sfValidatorText(),
            'adresse' => new sfValidatorText(),
            'ville' => new sfValidatorText()
        ));
    }

    protected function  doUpdateObject($values) {
        if ( $values['adresse'] != $this->getObject()->getAdresse() ) {
            $this->getObject()->setLatitude(null);
            $this->getObject()->setLongitude(null);
        }

        parent::doUpdateObject($values);
    }

}