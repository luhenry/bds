<?php


class mlActiviteTable extends mlMailTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mlActivite');
    }
}