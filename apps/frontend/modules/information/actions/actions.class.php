<?php

/**
 * informations actions.
 *
 * @package    BDS
 * @subpackage informations
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class informationActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

    }

    public function executePresentation(sfWebRequest $request) {

    }

    public function executeAdresses(sfWebRequest $request) {

    }

    public function executeMentionsLegales(sfWebRequest $request) {

    }

    public function executeFormulaire(sfWebRequest $request) {
        $this->form = new contactForm(array(), array('user' => $this->getUser()->isAuthenticated() ? $this->getUser()->getGuardUser() : null, 'request' => $request));

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                try {
                    $message = $this->getMailer()->compose()
                                    ->setFrom($this->form->getValue('email'))
                                    ->setTo('bds@utbm.fr')
                                    ->setSubject($this->form->getValue('sujet') !== '' ? $this->form->getValue('sujet') : 'Formulaire de contact')
                                    ->setBody($this->getPartial('information/contact_mail', array('nom' => $this->form->getValue('nom'), 'contenu' => $this->form->getValue('contenu'))))
                                    ->setContentType('text/plain')
                                    ->setCharset('utf-8');

                    $this->getMailer()->send($message);

                    $this->getUser()->setFlash('notice', 'Le message a été envoyé avec succès');
                    
                    $this->redirect('information_contact');
                } catch (sfStopException $e) {
                    throw $e;
                } catch (Exception $e) {
                    $this->getUser()->setFlash('error', "Erreur lors de l'envoi du message : {$e->getMessage()}");
                }
            }
        }
    }

    public function executeInscription(sfWebRequest $request) {
        $this->getResponse()->setTitle('Inscription');
    }

    public function executeEquipe(sfWebRequest $request) {//
        $this->getResponse()->setTitle("L'équipe");
    }

}
