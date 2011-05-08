<?php

/**
 * gaActivite actions.
 *
 * @package    BDS
 * @subpackage gaActivite
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gaActiviteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->activites = Doctrine_Query::create()
                        ->from('gaActivite a')
                        ->where('a.is_visible = ?', true)
                        ->andWhere('a.date_fin > now()')
                        ->leftJoin('a.contact')
                        ->leftJoin('a.participants')
                        ->orderBy('a.nom')
                        ->execute();
    }

    public function executeShow(sfWebRequest $request) {
        $this->activite = $this->getRoute()->getObject();
    }

    public function executeAdmin(sfWebRequest $request) {
        $this->activite = $this->getRoute()->getObject();

        $this->forward404Unless($this->activite->isAdmin($this->getUser()->getGuardUser()) || $this->getUser()->isSuperAdmin());

        $this->form = new gaActiviteForm($this->activite);

        if ($request->isMethod('post') || $request->isMethod('put')) {
            $this->form->bindAndSave($request->getParameter($this->form->getName()));
            $this->redirect('activite_admin', $this->activite);
        }
    }

    public function executeMailingList(sfWebRequest $request) {
        $this->activite = $this->getRoute()->getObject();

        $this->forward404Unless($this->activite->isAdmin($this->getUser()->getGuardUser()) || $this->getUser()->isSuperAdmin());

        $this->form = new mlActiviteForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                $this->form->getObject()->setGaActivite($this->activite);

                $mail = $this->form->save();

                try {
                    $mail->send($this->getMail(), $this->getUser()->getGuardUser());
                    $this->getUser()->setFlash('notice', 'Le message a été envoyé avec succès');
                } catch (Exception $e) {
                    $this->getUser()->setFlash('error', $e->getMessage());
                }
                
                $this->redirect('activite_mailing', $this->activite);
            }
        }
    }

}
