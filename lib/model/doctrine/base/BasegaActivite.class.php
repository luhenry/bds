<?php

/**
 * BasegaActivite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $contact_id
 * @property string $nom
 * @property string $lieu
 * @property string $site
 * @property string $description
 * @property timestamp $date_debut
 * @property timestamp $date_fin
 * @property boolean $is_visible
 * @property Doctrine_Collection $phPhotos
 * @property Doctrine_Collection $coCotisants
 * @property coCotisant $contact
 * @property Doctrine_Collection $participants
 * @property Doctrine_Collection $gaPhoto
 * @property Doctrine_Collection $mlMails
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getContactId()    Returns the current record's "contact_id" value
 * @method string              getNom()          Returns the current record's "nom" value
 * @method string              getLieu()         Returns the current record's "lieu" value
 * @method string              getSite()         Returns the current record's "site" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method timestamp           getDateDebut()    Returns the current record's "date_debut" value
 * @method timestamp           getDateFin()      Returns the current record's "date_fin" value
 * @method boolean             getIsVisible()    Returns the current record's "is_visible" value
 * @method Doctrine_Collection getPhPhotos()     Returns the current record's "phPhotos" collection
 * @method Doctrine_Collection getCoCotisants()  Returns the current record's "coCotisants" collection
 * @method coCotisant          getContact()      Returns the current record's "contact" value
 * @method Doctrine_Collection getParticipants() Returns the current record's "participants" collection
 * @method Doctrine_Collection getGaPhoto()      Returns the current record's "gaPhoto" collection
 * @method Doctrine_Collection getMlMails()      Returns the current record's "mlMails" collection
 * @method gaActivite          setId()           Sets the current record's "id" value
 * @method gaActivite          setContactId()    Sets the current record's "contact_id" value
 * @method gaActivite          setNom()          Sets the current record's "nom" value
 * @method gaActivite          setLieu()         Sets the current record's "lieu" value
 * @method gaActivite          setSite()         Sets the current record's "site" value
 * @method gaActivite          setDescription()  Sets the current record's "description" value
 * @method gaActivite          setDateDebut()    Sets the current record's "date_debut" value
 * @method gaActivite          setDateFin()      Sets the current record's "date_fin" value
 * @method gaActivite          setIsVisible()    Sets the current record's "is_visible" value
 * @method gaActivite          setPhPhotos()     Sets the current record's "phPhotos" collection
 * @method gaActivite          setCoCotisants()  Sets the current record's "coCotisants" collection
 * @method gaActivite          setContact()      Sets the current record's "contact" value
 * @method gaActivite          setParticipants() Sets the current record's "participants" collection
 * @method gaActivite          setGaPhoto()      Sets the current record's "gaPhoto" collection
 * @method gaActivite          setMlMails()      Sets the current record's "mlMails" collection
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasegaActivite extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ga_activites');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('contact_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('lieu', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('site', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('date_debut', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('date_fin', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('is_visible', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));

        $this->check('date_fin > date_debut');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('phPhoto as phPhotos', array(
             'refClass' => 'gaPhoto',
             'local' => 'activite_id',
             'foreign' => 'photo_id'));

        $this->hasMany('coCotisant as coCotisants', array(
             'refClass' => 'gaParticipant',
             'local' => 'activite_id',
             'foreign' => 'cotisant_id'));

        $this->hasOne('coCotisant as contact', array(
             'local' => 'contact_id',
             'foreign' => 'id',
             'onDelete' => 'set null',
             'onUpdate' => 'cascade'));

        $this->hasMany('gaParticipant as participants', array(
             'local' => 'id',
             'foreign' => 'activite_id'));

        $this->hasMany('gaPhoto', array(
             'local' => 'id',
             'foreign' => 'activite_id'));

        $this->hasMany('mlActivite as mlMails', array(
             'local' => 'id',
             'foreign' => 'activite_id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'name' => 'slug',
             'fields' => 
             array(
              0 => 'nom',
             ),
             'unique' => true,
             'canUpdate' => true,
             ));
        $this->actAs($sluggable0);
    }
}