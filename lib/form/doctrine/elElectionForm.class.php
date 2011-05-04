<?php

/**
 * elElection form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elElectionForm extends BaseelElectionForm {

    protected function removeFields() {
        unset($this['slug']);
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'nom' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormEditor(),
            'postes_list' => new sfWidgetFormDoctrineSelectDoubleList(array('model' => 'elPoste'))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'description' => new sfValidatorText()
        ));
    }

}
