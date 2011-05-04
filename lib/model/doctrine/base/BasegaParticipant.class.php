<?php

/**
 * BasegaParticipant
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $activite_id
 * @property integer $cotisant_id
 * @property enum $statut
 * @property boolean $is_admin
 * @property coCotisant $coCotisant
 * @property gaActivite $activite
 * 
 * @method integer       getActiviteId()  Returns the current record's "activite_id" value
 * @method integer       getCotisantId()  Returns the current record's "cotisant_id" value
 * @method enum          getStatut()      Returns the current record's "statut" value
 * @method boolean       getIsAdmin()     Returns the current record's "is_admin" value
 * @method coCotisant    getCoCotisant()  Returns the current record's "coCotisant" value
 * @method gaActivite    getActivite()    Returns the current record's "activite" value
 * @method gaParticipant setActiviteId()  Sets the current record's "activite_id" value
 * @method gaParticipant setCotisantId()  Sets the current record's "cotisant_id" value
 * @method gaParticipant setStatut()      Sets the current record's "statut" value
 * @method gaParticipant setIsAdmin()     Sets the current record's "is_admin" value
 * @method gaParticipant setCoCotisant()  Sets the current record's "coCotisant" value
 * @method gaParticipant setActivite()    Sets the current record's "activite" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasegaParticipant extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ga_participants');
        $this->hasColumn('activite_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('cotisant_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('statut', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'default' => 'Participant',
             'values' => 
             array(
              0 => 'Participant',
              1 => 'Responsable',
             ),
             ));
        $this->hasColumn('is_admin', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('coCotisant', array(
             'local' => 'cotisant_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));

        $this->hasOne('gaActivite as activite', array(
             'local' => 'activite_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));
    }
}