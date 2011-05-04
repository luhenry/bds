<?php

/**
 * Description of mailerForm
 *
 * @author ludovic
 */
class mailerForm extends BaseForm {

    public function configure() {
        BaseForm::configure();

        $this->widgetSchema->setNameFormat('contact[%s]');
    }

    protected function configureWidgets() {
        $this->setWidgets(array(
            'destinataires' => new sfWidgetFormChoice(array('choices' => array('cotisants' => 'cotisants', 'cotisants.actif' => 'cotisants.actif', 'cotisants.inactif' => 'cotisants.inactif'))),
            'objet' => new sfWidgetFormInputText(),
            'message' => new sfWidgetFormEditor()
        ));
    }

    protected function configureValidators() {
        $this->setValidators(array(
            'destinataires' => new sfValidatorChoice(array('choices' => array('cotisants' => 'cotisants', 'cotisants.actif' => 'cotisants.actif', 'cotisants.inactif' => 'cotisants.inactif'))),
            'objet' => new sfValidatorText(),
            'message' => new sfValidatorString()
        ));
    }

}