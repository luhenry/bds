<?php

/**
 * BasefiFifichier
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $dossier_id
 * @property string $filename
 * @property string $content_type
 * @property string $nom
 * @property fiDossier $dossier
 * 
 * @method integer     getId()           Returns the current record's "id" value
 * @method integer     getDossierId()    Returns the current record's "dossier_id" value
 * @method string      getFilename()     Returns the current record's "filename" value
 * @method string      getContentType()  Returns the current record's "content_type" value
 * @method string      getNom()          Returns the current record's "nom" value
 * @method fiDossier   getDossier()      Returns the current record's "dossier" value
 * @method fiFifichier setId()           Sets the current record's "id" value
 * @method fiFifichier setDossierId()    Sets the current record's "dossier_id" value
 * @method fiFifichier setFilename()     Sets the current record's "filename" value
 * @method fiFifichier setContentType()  Sets the current record's "content_type" value
 * @method fiFifichier setNom()          Sets the current record's "nom" value
 * @method fiFifichier setDossier()      Sets the current record's "dossier" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasefiFifichier extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fi_fichiers');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('dossier_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('filename', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('content_type', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('fiDossier as dossier', array(
             'local' => 'dossier_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));
    }
}