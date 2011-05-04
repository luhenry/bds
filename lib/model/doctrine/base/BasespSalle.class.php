<?php

/**
 * BasespSalle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nom
 * @property string $ville
 * @property string $adresse
 * @property float $latitude
 * @property float $longitude
 * @property Doctrine_Collection $horaires
 * 
 * @method integer             getId()        Returns the current record's "id" value
 * @method string              getNom()       Returns the current record's "nom" value
 * @method string              getVille()     Returns the current record's "ville" value
 * @method string              getAdresse()   Returns the current record's "adresse" value
 * @method float               getLatitude()  Returns the current record's "latitude" value
 * @method float               getLongitude() Returns the current record's "longitude" value
 * @method Doctrine_Collection getHoraires()  Returns the current record's "horaires" collection
 * @method spSalle             setId()        Sets the current record's "id" value
 * @method spSalle             setNom()       Sets the current record's "nom" value
 * @method spSalle             setVille()     Sets the current record's "ville" value
 * @method spSalle             setAdresse()   Sets the current record's "adresse" value
 * @method spSalle             setLatitude()  Sets the current record's "latitude" value
 * @method spSalle             setLongitude() Sets the current record's "longitude" value
 * @method spSalle             setHoraires()  Sets the current record's "horaires" collection
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasespSalle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sp_salles');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('ville', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('adresse', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('latitude', 'float', null, array(
             'type' => 'float',
             ));
        $this->hasColumn('longitude', 'float', null, array(
             'type' => 'float',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('spHoraire as horaires', array(
             'local' => 'id',
             'foreign' => 'salle_id'));
    }
}