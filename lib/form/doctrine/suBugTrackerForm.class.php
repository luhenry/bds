<?php

/**
 * suBugTracker form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class suBugTrackerForm extends BasesuBugTrackerForm {

    protected function removeFields() {
        unset(
                $this['created_at'],
                $this['updated_at']
        );
    }

    protected function configureWidgets() {
        $statuts = Doctrine::getTable($this->getModelName())->getStatuts();
        $range = range(date('Y'), date('Y') + 5);

        $this->setWidgets(array(
            'deadline' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%', 'years' => array_combine($range, $range))),
            'statut' => new sfWidgetFormChoice(array('choices' => array_combine($statuts, $statuts))),
            'problem' => new sfWidgetFormEditor(),
        ));
    }

    protected function configureValidators() {
        $statuts = Doctrine::getTable($this->getModelName())->getStatuts();
        
        $this->setvalidators(array(
            'statut' => new sfValidatorChoice(array('choices' => $statuts)),
            'problem' => new sfValidatorText(),
        ));
    }

}
