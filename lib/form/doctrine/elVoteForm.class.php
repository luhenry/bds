<?php

/**
 * elVote form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elVoteForm extends BaseelVoteForm {

    public function removeFields() {
        unset(
                $this['siege_id'],
                $this['cotisant_id']
        );
    }

    public function configureWidgets() {
        $this->setWidgets(array(
            'liste_id' => new sfWidgetFormChoice(array('choices' => $this->getOption('listes') !== null ? $this->getOption('listes') : array()))
        ));
    }

}
