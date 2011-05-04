<?php

/**
 * spSportTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    BDS
 * @subpackage table
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class spHoraireTable extends Doctrine_Table {

    /**
     * @return spHoraireTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('spHoraire');
    }

    /**
     * Retrieve a collection of 'horaires'<br/>
     * This function is called in the backend
     *
     * @param Doctrine_Query $q
     * @return Doctrine_Query
     */
    public function retrieveBackendList(Doctrine_Query $q) {
        $a = $q->getRootAlias();

        return $q->leftJoin($a . '.salle')
                ->leftJoin($a . '.sport');
    }

}