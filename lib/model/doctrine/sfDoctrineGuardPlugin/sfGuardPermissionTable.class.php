<?php

class sfGuardPermissionTable extends PluginsfGuardPermissionTable {

    /**
     *
     * @return sfGuardPermissionTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardPermission');
    }

}