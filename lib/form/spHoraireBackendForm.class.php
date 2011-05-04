<?php

/**
 * backendSpHorairetForm
 *
 * @package    BDS
 * @subpackage form_backend
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class spHoraireBackendForm extends spHoraireForm {

    protected function removeFields() {
        unset($this['id']);
    }

    protected function configureWidgets() {
//        sfLoader::loadHelpers(array('Date'));
        sfProjectConfiguration::getActive()->loadHelpers(array('Date'));
        
        $this->setWidgets(array(
            'sport_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSport', 'order_by' => array('nom', 'asc'))),
            'salle_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spSalle', 'order_by' => array('nom', 'asc'))),
            'statut_id' => new sfWidgetFormDoctrineChoice(array('model' => 'spHoraireStatut', 'order_by' => array('nom', 'asc'))),
            'jour' => new sfWidgetFormChoice(array('choices' => get_jours())),
        ));
    }

}