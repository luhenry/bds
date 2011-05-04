<?php

/**
 * Description of backendSpPhotoForm
 *
 * @author ludovic
 */
class spPhotoBackendForm extends spPhotoForm {

    protected function removeFields() {
        unset(
                $this['photo_id']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc')))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'sport_id' => new sfValidatorDoctrineChoice(array('model' => 'spSport'))
        ));
    }

    protected function updateSportIdColumn($value) {
        return $value;
    }

}