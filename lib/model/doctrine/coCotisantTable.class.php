<?php

/**
 * coCotisantTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    BDS
 * @subpackage table
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * @todo       Remove 'branche' and 'semestre'
 */
class coCotisantTable extends sfGuardUserTable {

    /**
     * @return coCotisantTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('coCotisant');
    }

    public function retrieveListBackend(Doctrine_Query $q) {
//        $a = $q->getRootAlias();

        return $q;
    }

    public function __toString() {
        $str = '';
        $count = $this->count();

        for ($i = 0; $i < $count - 1; $i++) {
            $str .= $this[$i] . ', ';
        }

        $str .= $this[$count - 1];

        return $str;
    }

}