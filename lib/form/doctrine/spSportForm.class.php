<?php

/**
 * spSport form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spSportForm extends BasespSportForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['is_visible'],
                $this['is_actif'],
                $this['updated_at'],
                $this['created_at'],
                $this['slug'],
                $this['ph_photos_list']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormEditor(),
            'materiel' => new sfWidgetFormEditor(),
            'co_cotisants_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'), 'label' => 'Participants')),
        ));
    }

    protected function configureValidators() {
        $this->setvalidators(array(
            'nom' => new sfValidatorText(),
            'description' => new sfValidatorText(),
            'materiel' => new sfValidatorText(array('required' => false))
        ));
    }

}
