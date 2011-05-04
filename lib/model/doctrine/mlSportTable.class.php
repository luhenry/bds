<?php


class mlSportTable extends mlMailTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mlSport');
    }
}