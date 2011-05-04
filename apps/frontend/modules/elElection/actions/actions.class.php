<?php

/**
 * elElection actions.
 *
 * @package    BDS
 * @subpackage elElection
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elElectionActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeShow(sfWebRequest $request) {
        $this->sieges = Doctrine_Query::create()
                        ->from('elSiege s')
                        ->leftJoin('s.poste')
                        ->leftJoin('s.listes l')
                        ->leftJoin('s.election e')
                        ->leftJoin('l.coCotisants')
                        ->leftJoin('s.votes v')
                        ->where('e.slug = ?', $request->getParameter('slug'))
                        ->andWhere('s.id NOT IN (SELECT v1.siege_id FROM elVote v1 WHERE v1.cotisant_id = ?)', $this->getUser()->getId())
                        ->orderBy('s.id')
                        ->execute();

        $this->forward404Unless($this->sieges);

        $this->forms = array();

        foreach ($this->sieges as $poste) {
            $listes = array();

            foreach ($poste->getListes() as $liste) {
                $listes[$liste['id']] = $liste;
            }

            $this->forms[$poste->getId()] = new elVoteForm(null, array('listes' => $listes));
        }
    }

    public function executeVote(sfWebRequest $request) {
        $siege = $this->getRoute()->getObject();

        $vote = new elVote();
        $vote->setSiege($siege);
        $vote->setCoCotisant($this->getUser()->getGuardUser());
        
        $form = new elVoteForm($vote);

        $form->bind($request->getParameter($form->getName()));

        if ($form->isValid()) {
            $vote->setListeId($form->getValue('liste_id'));
            $vote->save();
        } else {
            $this->getUser()->setFlash('error', 'Erreur lors de l\'enregistrement du vote');
        }

        $this->redirect($this->generateUrl('election_show', $siege->getElection()));
    }

}
