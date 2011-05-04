<?php

/**
 * Description of sfGuardRequestForgotPasswordForm
 *
 * @author ludovic
 */
class sfGuardRequestForgotPasswordForm extends BasesfGuardRequestForgotPasswordForm {

    public function configure() {
        unset($this['email_address']);

        $this->widgetSchema['username'] = new sfWidgetFormInput();
        $this->validatorSchema['username'] = new sfValidatorString();
    }

    public function isValid() {
        if ( sfForm::isValid() ) {
            $values = $this->getValues();

            $this->user = Doctrine_Core::getTable('sfGuardUser')
                            ->createQuery('u')
                            ->where('u.username = ?', $values['username'])
                            ->fetchOne();

            return $this->user ? true : false;
        } else {
            return false;
        }
    }

}