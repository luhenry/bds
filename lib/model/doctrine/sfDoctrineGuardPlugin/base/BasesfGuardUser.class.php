<?php

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property boolean $is_actif
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $semestre_debut_cotisation
 * @property string $semestre_fin_cotisation
 * @property date $date_certificat
 * @property string $photo
 * @property string $certificat
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * 
 * @method string                getUsername()                  Returns the current record's "username" value
 * @method string                getAlgorithm()                 Returns the current record's "algorithm" value
 * @method string                getSalt()                      Returns the current record's "salt" value
 * @method string                getPassword()                  Returns the current record's "password" value
 * @method boolean               getIsActive()                  Returns the current record's "is_active" value
 * @method boolean               getIsSuperAdmin()              Returns the current record's "is_super_admin" value
 * @method timestamp             getLastLogin()                 Returns the current record's "last_login" value
 * @method boolean               getIsActif()                   Returns the current record's "is_actif" value
 * @method string                getNom()                       Returns the current record's "nom" value
 * @method string                getPrenom()                    Returns the current record's "prenom" value
 * @method string                getEmail()                     Returns the current record's "email" value
 * @method string                getSemestreDebutCotisation()   Returns the current record's "semestre_debut_cotisation" value
 * @method string                getSemestreFinCotisation()     Returns the current record's "semestre_fin_cotisation" value
 * @method date                  getDateCertificat()            Returns the current record's "date_certificat" value
 * @method string                getPhoto()                     Returns the current record's "photo" value
 * @method string                getCertificat()                Returns the current record's "certificat" value
 * @method Doctrine_Collection   getGroups()                    Returns the current record's "Groups" collection
 * @method Doctrine_Collection   getPermissions()               Returns the current record's "Permissions" collection
 * @method Doctrine_Collection   getSfGuardUserPermission()     Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection   getSfGuardUserGroup()          Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey    getRememberKeys()              Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()            Returns the current record's "ForgotPassword" value
 * @method sfGuardUser           setUsername()                  Sets the current record's "username" value
 * @method sfGuardUser           setAlgorithm()                 Sets the current record's "algorithm" value
 * @method sfGuardUser           setSalt()                      Sets the current record's "salt" value
 * @method sfGuardUser           setPassword()                  Sets the current record's "password" value
 * @method sfGuardUser           setIsActive()                  Sets the current record's "is_active" value
 * @method sfGuardUser           setIsSuperAdmin()              Sets the current record's "is_super_admin" value
 * @method sfGuardUser           setLastLogin()                 Sets the current record's "last_login" value
 * @method sfGuardUser           setIsActif()                   Sets the current record's "is_actif" value
 * @method sfGuardUser           setNom()                       Sets the current record's "nom" value
 * @method sfGuardUser           setPrenom()                    Sets the current record's "prenom" value
 * @method sfGuardUser           setEmail()                     Sets the current record's "email" value
 * @method sfGuardUser           setSemestreDebutCotisation()   Sets the current record's "semestre_debut_cotisation" value
 * @method sfGuardUser           setSemestreFinCotisation()     Sets the current record's "semestre_fin_cotisation" value
 * @method sfGuardUser           setDateCertificat()            Sets the current record's "date_certificat" value
 * @method sfGuardUser           setPhoto()                     Sets the current record's "photo" value
 * @method sfGuardUser           setCertificat()                Sets the current record's "certificat" value
 * @method sfGuardUser           setGroups()                    Sets the current record's "Groups" collection
 * @method sfGuardUser           setPermissions()               Sets the current record's "Permissions" collection
 * @method sfGuardUser           setSfGuardUserPermission()     Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser           setSfGuardUserGroup()          Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser           setRememberKeys()              Sets the current record's "RememberKeys" value
 * @method sfGuardUser           setForgotPassword()            Sets the current record's "ForgotPassword" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('username', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('is_actif', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
        $this->hasColumn('nom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('prenom', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('semestre_debut_cotisation', 'string', 3, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 3,
             ));
        $this->hasColumn('semestre_fin_cotisation', 'string', 3, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 3,
             ));
        $this->hasColumn('date_certificat', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('photo', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('certificat', 'string', null, array(
             'type' => 'string',
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}