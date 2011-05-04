<?php


class mlMailingListTable extends Doctrine_Table
{

    /**
     *
     * @return mlMailingListTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mlMailingList');
    }
}