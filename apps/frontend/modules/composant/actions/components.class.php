<?php

class composantComponents extends sfComponents {

    public function executeMenu() {
        switch ($this->getRequestParameter('module')) {
            case 'information':
                switch ($this->getRequestParameter('action')) {
                    case 'index': $this->current = 'accueil';
                        break;
                    case 'adresses':
                    case 'formulaire':
                    case 'mentionsLegales': $this->current = 'nous_contacter';
                        break;
                    default: $this->current = 'le_bds';
                        break;
                }
                break;
            case 'acActualite':
            case 'aCommentaire':
                $this->current = 'l_actualite';
                break;
            case 'spSport':
                $this->current = 'les_sports';
                break;
            case 'gaActivite': $this->current = 'les_grandes_activites';
                break;
            case 'coCotisant': $this->current = 'les_cotisants';
                break;
            case 'elElection': $this->current = 'elections';
                break;
            default: $this->current = 'accueil';
        }
    }

}