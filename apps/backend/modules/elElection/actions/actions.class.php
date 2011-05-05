<?php

require_once dirname(__FILE__) . '/../lib/elElectionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/elElectionGeneratorHelper.class.php';

/**
 * elElection actions.
 *
 * @package    BDS
 * @subpackage elElection
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elElectionActions extends autoElElectionActions {

    public function executeListResultats(sfWebRequest $request) {
        $this->election = Doctrine_Query::create()
                        ->from('elElection e')
                        ->leftJoin('e.sieges s')
                        ->leftJoin('s.poste')
                        ->leftJoin('s.listes l')
                        ->leftJoin('l.votes')
                        ->leftJoin('l.coCotisants')
                        ->where('e.id = ?', $request->getParameter('id'))
                        ->fetchOne();

        $this->forward404Unless($this->election);

        if (strtotime($this->election->getDateFin()) > time() && !$this->getUser()->isSuperAdmin()) {
            $this->getUser()->setFlash('error', "Cette élection n'est pas encore terminé. Il est pour l'instant impossible de consulter les résultats");
            $this->redirect('el_election');
        }
    }

}
