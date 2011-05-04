<?php

/**
 * acActualite form.
 *
 * @package    BDS
 * @subpackage form_doctrine
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acActualiteForm extends BaseacActualiteForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['cotisant_id'],
                $this['is_visible'],
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
        $this->setValidators(array(
            'titre' => new sfValidatorText(),
            'contenu' => new sfValidatorText()
        ));
    }

}
