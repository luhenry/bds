<?php

/**
 * Description of backendSpPhotoForm
 *
 * @author ludovic
 */
class spPhotoBackendForm extends spPhotoForm {

    protected function configureWidgets() {
        phPhotoForm::configureWidgets();

        $this->setWidgets(array(            
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc')))
        ));
    }

    protected function configureValidators() {
        phPhotoForm::configureValidators();
        
        $this->setValidators(array(
            'sport_id' => new sfValidatorDoctrineChoice(array('model' => 'spSport'))
        ));
    }

    protected function updateSportIdColumn($value) {
        return $value;
    }

}