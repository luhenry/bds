<?php

/**
 * gaActivite form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gaActiviteForm extends BasegaActiviteForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['slug'],
                $this['is_visible'],
                $this['ph_photos_list']
        );
    }

    protected function configureValidators() {
        $this->setvalidators(array(
            'nom' => new sfValidatorText(),
            'lieu' => new sfValidatorText(),
            'site' => new sfValidatorText(),
            'description' => new sfValidatorText()
        ));
    }

    public function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'lieu' => new sfWidgetFormInputText(),
            'site' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormEditor(),
            'date_debut' => new sfWidgetFormDateTime(array('date' => array('format' => '%day%/%month%/%year%'))),
            'date_fin' => new sfWidgetFormDateTime(array('date' => array('format' => '%day%/%month%/%year%'))),
            'co_cotisants_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'), 'label' => 'Participants'))
        ));
    }

}
