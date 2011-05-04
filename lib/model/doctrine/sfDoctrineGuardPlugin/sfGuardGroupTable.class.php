<?php

class sfGuardGroupTable extends PluginsfGuardGroupTable {

    /**
     *
     * @return sfGuardGroupTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardGroup');
    }

}