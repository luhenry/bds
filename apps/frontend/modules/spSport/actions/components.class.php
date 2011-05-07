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

    public function executeSportsTrierParNom() {
        $q = Doctrine_Query::create()
                        ->from('spSport s')
                        ->leftJoin('s.participants p')
                        ->leftJoin('p.coCotisant c')
                        ->leftJoin('s.horaires h')
                        ->leftJoin('h.salle sa')
                        ->where('s.is_visible = true')
                        ->andWhere('s.is_actif = true')
                        ->orderBy(strtr('s.nom, (h.jour + %decalage%) % 7', array('%decalage%' => (7 - date('N')))));

        if ($this->hasRequestParameter('recherche') && trim($this->getRequestParameter('recherche')) !== '')
            $q->andWhere('lower(s.nom) LIKE ?', '%' . strtolower($this->getRequestParameter('recherche')) . '%');

        $this->sports = $q->execute();
    }

    public function executeSportsTrierParJour() {
        $q = Doctrine_Query::create()
                        ->from('spHoraire h')
                        ->leftJoin('h.sport s')
                        ->leftJoin('s.participants p')
                        ->leftJoin('p.coCotisant')
                        ->leftJoin('h.salle')
                        ->where('s.is_visible = true')
                        ->andWhere('s.is_actif = true')
                        ->orderBy(strtr('(h.jour + %decalage%) % 7, s.nom', array('%decalage%' => (7 - date('N')))));

        if ($this->hasRequestParameter('recherche') && trim($this->getRequestParameter('recherche')) !== '')
            $q->andWhere('lower(s.nom) LIKE ?', '%' . strtolower($this->getRequestParameter('recherche')) . '%');

        $this->horaires = $q->execute();
    }

}