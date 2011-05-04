<?php

class acActualiteComponents extends sfComponents {

    public function executeFlux() {
        $this->actualites = Doctrine_Query::create()
                        ->from('acActualite a')
                        ->leftJoin('a.commentaires')
                        ->where('a.is_visible = true')
                        ->orderBy('a.created_at DESC')
                        ->limit($this->hasRequestParameter('limit') ? $this->getRequestParameter('limit') : sfConfig::get('app_actualite_max_number_index', 15))
                        ->execute();
    }

}