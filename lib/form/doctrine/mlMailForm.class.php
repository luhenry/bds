<?php

/**
 * mlMail form.
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mlMailForm extends BasemlMailForm {

    protected function removeFields() {
        unset(
                $this['id'],
                $this['cotisant_id'],
                $this['sport_id'],
                $this['activite_id'],
                $this['created_at'],
                $this['updated_at'],
                $this['sent_at'],
                $this['type']
        );
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'objet' => new sfWidgetFormInputText(),
            'contenu' => new sfWidgetFormTextarea(array(), array('style' => 'width:100%', 'rows' => 15))
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'objet' => new sfValidatorText(),
            'contenu' => new sfValidatorText()
        ));
    }

}
