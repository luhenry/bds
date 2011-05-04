<?php

class acCommentaireComponents extends sfComponents {

    /**
     *
     */
    public function executeList() {
        $this->pager = new sfDoctrinePager('acCommentaire', sfConfig::get('app_actualite_max_number_index', 15));
        $this->pager->setQuery(Doctrine_Query::create()->from('acCommentaire')->where('actualite_id = ?', $this->actualite->getId()));
        $this->pager->setPage($this->page);
        $this->pager->init();

        $this->commentaires = $this->pager->getResults();
    }

    public function executeForm() {
        $this->action = url_for(
                        $this->form->isNew() ?
                                'acCommentaire/create?actualite_id=' . $this->getRequestParameter('actualite_id') :
                                'acCommentaire/update?id=' . $this->form->getObject()->getId() . '&actualite_id=' . $this->form->getObject()->getActualiteId()
        );
    }

}