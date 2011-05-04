<?php

/**
 * BasemlMailingList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nom
 * @property Doctrine_Collection $coCotisants
 * @property Doctrine_Collection $cotisant
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getNom()         Returns the current record's "nom" value
 * @method Doctrine_Collection getCoCotisants() Returns the current record's "coCotisants" collection
 * @method Doctrine_Collection getCotisant()    Returns the current record's "cotisant" collection
 * @method mlMailingList       setId()          Sets the current record's "id" value
 * @method mlMailingList       setNom()         Sets the current record's "nom" value
 * @method mlMailingList       setCoCotisants() Sets the current record's "coCotisants" collection
 * @method mlMailingList       setCotisant()    Sets the current record's "cotisant" collection
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemlMailingList extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ml_mailing_lists');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'unique' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('coCotisant as coCotisants', array(
             'refClass' => 'mlMailingListDestinataire',
             'local' => 'list_id',
             'foreign' => 'cotisant_id'));

        $this->hasMany('mlMailingListDestinataire as cotisant', array(
             'local' => 'id',
             'foreign' => 'list_id'));
    }
}