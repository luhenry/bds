<?php

/**
 * elListe form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elListeForm extends BaseelListeForm {

    protected function configureWidgets() {
        $this->setWidgets(array(
            'description' => new sfWidgetFormEditor(),
            'co_cotisants_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'coCotisant', 'order_by' => array('prenom, nom', 'asc'))),
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'description' => new sfValidatorText()
        ));
    }

}
