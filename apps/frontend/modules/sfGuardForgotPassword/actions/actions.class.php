<?php

require_once (sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardForgotPassword/lib/BasesfGuardForgotPasswordActions.class.php');

/**
 * sfGuardForgotPassword actions.
 *
 * @package    BDS
 * @subpackage sfGuardForgotPassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class sfGuardForgotPasswordActions extends BasesfGuardForgotPasswordActions {

    public function executeIndex($request) {
        $this->form = new sfGuardRequestForgotPasswordForm();

        if ( $request->isMethod('post') ) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ( $this->form->isValid() ) {
                $this->user = $this->form->user;
                $this->_deleteOldUserForgotPasswordRecords();

                $forgotPassword = new sfGuardForgotPassword();
                $forgotPassword->user_id = $this->form->user->id;
                $forgotPassword->unique_key = md5(rand() + time());
                $forgotPassword->expires_at = new Doctrine_Expression('NOW()');
                $forgotPassword->save();

                $message = Swift_Message::newInstance()
                                ->setFrom('bds@utbm.fr')
                                ->setTo($this->form->user->email)
                                ->setSubject('Mot de passe oublié')
                                ->setBody($this->getPartial('sfGuardForgotPassword/send_request', array('user' => $this->form->user, 'forgot_password' => $forgotPassword)))
                                ->setContentType('text/html');

                $this->getMailer()->send($message);

                $this->getUser()->setFlash('notice', 'Vérifier vos emails! Vous devriez recevoir quelquechose bientôt!');
                $this->redirect('@sf_guard_signin');
            } else {
                $this->getUser()->setFlash('error', 'Identifiant invalide');
            }
        }
    }

    public function executeChange($request) {
        $this->forgotPassword = $this->getRoute()->getObject();
        $this->user = $this->forgotPassword->User;
        $this->form = new sfGuardChangeUserPasswordForm($this->user);

        if ( $request->isMethod('post') ) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ( $this->form->isValid() ) {
                $this->form->save();

                $this->_deleteOldUserForgotPasswordRecords();

                $message = Swift_Message::newInstance()
                                ->setFrom('bds@utbm.fr')
                                ->setTo($this->user->email)
                                ->setSubject('Nouveau mot de passe')
                                ->setBody($this->getPartial('sfGuardForgotPassword/new_password', array('user' => $this->user, 'password' => $request[$this->form->getName()]['password'])));

                $this->getMailer()->send($message);

                $this->getUser()->setFlash('notice', 'Mot de passe mis à jour avec succès');
                $this->redirect('@sf_guard_signin');
            }
        }
    }

}
