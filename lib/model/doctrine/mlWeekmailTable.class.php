<?php


class mlWeekmailTable extends mlMailTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mlWeekmail');
    }
}