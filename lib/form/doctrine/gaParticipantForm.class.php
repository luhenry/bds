<?php

/**
 * gaParticipant form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gaParticipantForm extends BasegaParticipantForm {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'activite_id' => new sfWidgetFormDoctrineChoice(array('model' => 'gaActivite', 'order_by' => array('nom', 'asc'))),
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'))),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'activite_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('activite'), 'required' => false)),
            'cotisant_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'required' => false)),
        ));
    }
}
