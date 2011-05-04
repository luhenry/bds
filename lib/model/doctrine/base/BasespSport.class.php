<?php

/**
 * BasespSport
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $materiel
 * @property boolean $is_actif
 * @property boolean $is_visible
 * @property Doctrine_Collection $phPhotos
 * @property Doctrine_Collection $coCotisants
 * @property Doctrine_Collection $spPhoto
 * @property Doctrine_Collection $participants
 * @property Doctrine_Collection $horaires
 * @property Doctrine_Collection $mlMails
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getNom()          Returns the current record's "nom" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method string              getMateriel()     Returns the current record's "materiel" value
 * @method boolean             getIsActif()      Returns the current record's "is_actif" value
 * @method boolean             getIsVisible()    Returns the current record's "is_visible" value
 * @method Doctrine_Collection getPhPhotos()     Returns the current record's "phPhotos" collection
 * @method Doctrine_Collection getCoCotisants()  Returns the current record's "coCotisants" collection
 * @method Doctrine_Collection getSpPhoto()      Returns the current record's "spPhoto" collection
 * @method Doctrine_Collection getParticipants() Returns the current record's "participants" collection
 * @method Doctrine_Collection getHoraires()     Returns the current record's "horaires" collection
 * @method Doctrine_Collection getMlMails()      Returns the current record's "mlMails" collection
 * @method spSport             setId()           Sets the current record's "id" value
 * @method spSport             setNom()          Sets the current record's "nom" value
 * @method spSport             setDescription()  Sets the current record's "description" value
 * @method spSport             setMateriel()     Sets the current record's "materiel" value
 * @method spSport             setIsActif()      Sets the current record's "is_actif" value
 * @method spSport             setIsVisible()    Sets the current record's "is_visible" value
 * @method spSport             setPhPhotos()     Sets the current record's "phPhotos" collection
 * @method spSport             setCoCotisants()  Sets the current record's "coCotisants" collection
 * @method spSport             setSpPhoto()      Sets the current record's "spPhoto" collection
 * @method spSport             setParticipants() Sets the current record's "participants" collection
 * @method spSport             setHoraires()     Sets the current record's "horaires" collection
 * @method spSport             setMlMails()      Sets the current record's "mlMails" collection
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasespSport extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sp_sports');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('materiel', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('is_actif', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_visible', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('phPhoto as phPhotos', array(
             'refClass' => 'spPhoto',
             'local' => 'sport_id',
             'foreign' => 'photo_id'));

        $this->hasMany('coCotisant as coCotisants', array(
             'refClass' => 'spParticipant',
             'local' => 'sport_id',
             'foreign' => 'cotisant_id'));

        $this->hasMany('spPhoto', array(
             'local' => 'id',
             'foreign' => 'sport_id'));

        $this->hasMany('spParticipant as participants', array(
             'local' => 'id',
             'foreign' => 'sport_id'));

        $this->hasMany('spHoraire as horaires', array(
             'local' => 'id',
             'foreign' => 'sport_id'));

        $this->hasMany('mlSport as mlMails', array(
             'local' => 'id',
             'foreign' => 'sport_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'name' => 'slug',
             'fields' => 
             array(
              0 => 'nom',
             ),
             'unique' => true,
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}