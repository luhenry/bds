<?php

/**
 * acActualite actions.
 *
 * @package    BDS
 * @subpackage acActualite
 * @author     Ludovic Henry
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acActualiteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $q = Doctrine_Query::create()
                        ->from('acActualite a')
                        ->leftJoin('a.coCotisant c')
                        ->leftJoin('a.commentaires co')
                        ->leftJoin('a.tags t')
                        ->where('a.is_visible = true')
                        ->orderBy('a.created_at DESC');

        $this->pager = new sfDoctrinePager('acActualite', sfConfig::get('app_actualite_max_number_index', 15));
        $this->pager->setQuery($q);
        $this->pager->setPage($this->getRequestParameter('page'));
        $this->pager->init();

        $this->actualites = $this->pager->getResults();
    }

    /**
     * Executes show action
     *
     * @param sfRequest $request A request object
     */
    public function executeShow(sfWebRequest $request) {
        $this->actualite = Doctrine_Query::create()
                        ->from('acActualite a')
                        ->leftJoin('a.coCotisant')
                        ->leftJoin('a.commentaires c')
                        ->leftJoin('c.coCotisant')
                        ->where('a.is_visible = true')
                        ->andWhere('a.slug = ?', $request->getParameter('slug'))
                        ->fetchOne();

        $this->forward404Unless($this->actualite);
    }

}
