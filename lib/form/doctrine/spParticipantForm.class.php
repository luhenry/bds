<?php

/**
 * spParticipant form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spParticipantForm extends BasespParticipantForm {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'))),
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc')))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'sport_id' => new sfValidatorDoctrineChoice(array('model' => 'spSport')),
            'cotisant_id' => new sfValidatorDoctrineChoice(array('model' => 'coCotisant'))
        ));
    }

}
