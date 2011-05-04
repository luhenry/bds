<?php

class sfGuardUserTable extends PluginsfGuardUserTable {

    /**
     *
     * @return sfGuardUserTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardUser');
    }

    public function retrieveByUsernameOrEmailAddress($username, $isActive = true) {
        $query = Doctrine_Core::getTable('sfGuardUser')->createQuery('u')
                        ->where('u.username = ? OR u.email = ?', array($username, $username))
                        ->addWhere('u.is_active = ?', $isActive);

        return $query->fetchOne();
    }

}