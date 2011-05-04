<?php

/**
 * acCommentaire actions.
 *
 * @package    BDS
 * @subpackage acCommentaire
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acCommentaireActions extends sfActions {

    /**
     * Executes new action
     *
     * @param sfWebRequest $request 
     */
    public function executeNew(sfWebRequest $request) {
        $this->form = new acCommentaireForm(null, array(
                    'actualite' => acActualiteTable::getInstance()->findOneBy('id', $request->getParameter('actualite_id')),
                    'user' => $this->getUser()->getGuardUser()
                ));
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new acCommentaireForm(null, array('actualite' => acActualiteTable::getInstance()->findOneBy('id', $request->getParameter('actualite_id')), 'user' => $this->getUser()->getGuardUser()));

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $commentaire = $this->getRoute()->getObject();

        $this->forward404Unless($commentaire->getCotisantId() === $this->getUser()->getGuardUser()->getId());

        $this->form = new acCommentaireForm($commentaire, array('actualite' => $commentaire->getActualite(), 'user' => $this->getUser()->getGuardUser()));
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($commentaire = Doctrine::getTable('acCommentaire')->findOneBy('id', $request->getParameter('id')));
        $this->forward404Unless($commentaire->getCotisantId() === $this->getUser()->getGuardUser()->getId());

        $this->form = new acCommentaireForm($commentaire, array('actualite' => $commentaire->getActualite(), 'user' => $this->getUser()->getGuardUser()));

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $this->forward404Unless($commentaire = acCommentaireTable::getInstance()->findOneBy('id', $request->getParameter('id')));
        $this->forward404Unless($this->getUser()->getId() === $commentaire->getCotisantId());

        $url = $this->generateUrl('actualite_show', $commentaire->getActualite());

        $commentaire->delete();

        $this->redirect($url);
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()));

        if ($form->isValid())
            $this->redirect($this->generateUrl('actualite_show', $form->save()->getActualite()));
    }

}
