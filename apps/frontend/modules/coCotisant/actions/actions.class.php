<?php

/**
 * coCotisant actions.
 *
 * @package    BDS
 * @subpackage coCotisant
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class coCotisantActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        // TODO: ajouter le formulaire de recherche de cotisant
    }

    public function executeShow(sfWebRequest $request) {
        $this->cotisant = $this->getRoute()->getObject();
    }

    public function executeChangePassword(sfWebRequest $request) {
        $this->user = coCotisantTable::getInstance()->findOneBy('slug', $request->getParameter('slug'));
        $this->forward404Unless($this->user->getId() == $this->getUser()->getGuardUser()->getId());
        $this->form = new sfGuardChangeUserPasswordForm($this->user);

        if ( $request->isMethod('post') ) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ( $this->form->isValid() ) {
                $this->form->save();

                $message = Swift_Message::newInstance()
                                ->setFrom('bds@utbm.fr')
                                ->setTo($this->user->email)
                                ->setSubject('Nouveau mot de passe')
                                ->setBody($this->getPartial('sfGuardForgotPassword/new_password', array('user' => $this->user, 'password' => $request[$this->form->getName()]['password'])));

                $this->getMailer()->send($message);

                $this->getUser()->setFlash('notice', 'Mot de passe mis à jour avec succès');
                $this->redirect($this->generateUrl('cotisant_show', $this->user));
            }
        }
    }

}
