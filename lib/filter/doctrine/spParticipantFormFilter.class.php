<?php

/**
 * spParticipant filter form.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spParticipantFormFilter extends BasespParticipantFormFilter {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc'), 'add_empty' => true)),
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'), 'add_empty' => true)),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'sport_id' => new sfValidatorDoctrineChoice(array('model' => 'spSport', 'required' => false)),
            'cotisant_id' => new sfValidatorDoctrineChoice(array('model' => 'coCotisant', 'required' => false)),
        ));
    }

    public function getFields() {
        return array(
            'sport_id' => 'ForeignKey',
            'cotisant_id' => 'ForeignKey',
            'statut' => 'Enum',
            'is_admin' => 'Boolean',
        );
    }

}
