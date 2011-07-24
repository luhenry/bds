<?php

/**
 * sfGuardUser filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'algorithm'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'                      => new sfWidgetFormFilterInput(),
      'password'                  => new sfWidgetFormFilterInput(),
      'is_active'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_login'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'type'                      => new sfWidgetFormFilterInput(),
      'is_actif'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nom'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prenom'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'semestre_debut_cotisation' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'semestre_fin_cotisation'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_certificat'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'photo'                     => new sfWidgetFormFilterInput(),
      'certificat'                => new sfWidgetFormFilterInput(),
      'slug'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'groups_list'               => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
      'permissions_list'          => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'username'                  => new sfValidatorPass(array('required' => false)),
      'algorithm'                 => new sfValidatorPass(array('required' => false)),
      'salt'                      => new sfValidatorPass(array('required' => false)),
      'password'                  => new sfValidatorPass(array('required' => false)),
      'is_active'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_login'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'type'                      => new sfValidatorPass(array('required' => false)),
      'is_actif'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nom'                       => new sfValidatorPass(array('required' => false)),
      'prenom'                    => new sfValidatorPass(array('required' => false)),
      'email'                     => new sfValidatorPass(array('required' => false)),
      'semestre_debut_cotisation' => new sfValidatorPass(array('required' => false)),
      'semestre_fin_cotisation'   => new sfValidatorPass(array('required' => false)),
      'date_certificat'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'photo'                     => new sfValidatorPass(array('required' => false)),
      'certificat'                => new sfValidatorPass(array('required' => false)),
      'slug'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'groups_list'               => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
      'permissions_list'          => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfGuardUserGroup sfGuardUserGroup')
      ->andWhereIn('sfGuardUserGroup.group_id', $values)
    ;
  }

  public function addPermissionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfGuardUserPermission sfGuardUserPermission')
      ->andWhereIn('sfGuardUserPermission.permission_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'sfGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'username'                  => 'Text',
      'algorithm'                 => 'Text',
      'salt'                      => 'Text',
      'password'                  => 'Text',
      'is_active'                 => 'Boolean',
      'is_super_admin'            => 'Boolean',
      'last_login'                => 'Date',
      'type'                      => 'Text',
      'is_actif'                  => 'Boolean',
      'nom'                       => 'Text',
      'prenom'                    => 'Text',
      'email'                     => 'Text',
      'semestre_debut_cotisation' => 'Text',
      'semestre_fin_cotisation'   => 'Text',
      'date_certificat'           => 'Date',
      'photo'                     => 'Text',
      'certificat'                => 'Text',
      'slug'                      => 'Text',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'groups_list'               => 'ManyKey',
      'permissions_list'          => 'ManyKey',
    );
  }
}
