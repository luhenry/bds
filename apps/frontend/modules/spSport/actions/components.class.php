<?php

/**
 * Description of spSportComponents
 *
 * @author ludovic
 */
class spSportComponents extends sfComponents {

    public function executeSportsDuJour() {
        $this->sports = Doctrine_Query::create()
                        ->select('s.*, h.heure_debut, h.heure_fin, sa.*')
                        ->from('spSport s')
                        ->innerJoin('s.horaires h')
                        ->innerJoin('h.salle sa')
                        ->innerJoin('h.statut st')
                        ->where('h.jour = ?', date('N'))
                        ->andwhere('s.is_actif = true')
                        ->andWhere('st.is_ouvert = true')
                        ->orderBy('sa.ville, h.heure_debut, s.nom')
                        ->execute();
    }

}