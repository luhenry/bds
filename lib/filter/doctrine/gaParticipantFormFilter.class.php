<?php

/**
 * gaParticipant filter form.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gaParticipantFormFilter extends BasegaParticipantFormFilter {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'activite_id' => new sfWidgetFormDoctrineChoice(array('model' => 'gaActivite', 'order_by' => array('nom', 'asc'), 'add_empty' => true)),
            'cotisant_id' => new sfWidgetFormDoctrineChoice(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'), 'add_empty' => true)),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'activite_id' => new sfValidatorDoctrineChoice(array('model' => 'gaActivite', 'required' => false)),
            'cotisant_id' => new sfValidatorDoctrineChoice(array('model' => 'coCotisant', 'required' => false)),
        ));
    }

    public function getFields() {
        return array(
            'activite_id' => 'ForeignKey',
            'cotisant_id' => 'ForeignKey',
            'statut' => 'Enum',
            'is_admin' => 'Boolean',
        );
    }

}
