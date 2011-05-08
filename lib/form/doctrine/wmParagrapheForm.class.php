<?php

/**
 * wmParagraphe form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wmParagrapheForm extends BasewmParagrapheForm {

    protected function removeFields() {
        unset(
                $this['created_at'],
                $this['updated_at']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'titre' => new sfWidgetFormInputText(),
            'contenu' => new sfWidgetFormEditor(),
        ));
    }

    protected function configureValidators() {
        $this->setvalidators(array(
            'titre' => new sfValidatorText(),
            'contenu' => new sfValidatorText(),
        ));
    }

}
