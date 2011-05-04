<?php

/**
 * spSport filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasespSportFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'materiel'          => new sfWidgetFormFilterInput(),
      'is_actif'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_visible'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'              => new sfWidgetFormFilterInput(),
      'ph_photos_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto')),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'nom'               => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'materiel'          => new sfValidatorPass(array('required' => false)),
      'is_actif'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_visible'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'              => new sfValidatorPass(array('required' => false)),
      'ph_photos_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto', 'required' => false)),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sp_sport_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addPhPhotosListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.spPhoto spPhoto')
      ->andWhereIn('spPhoto.photo_id', $values)
    ;
  }

  public function addCoCotisantsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.spParticipant spParticipant')
      ->andWhereIn('spParticipant.cotisant_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'spSport';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nom'               => 'Text',
      'description'       => 'Text',
      'materiel'          => 'Text',
      'is_actif'          => 'Boolean',
      'is_visible'        => 'Boolean',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'slug'              => 'Text',
      'ph_photos_list'    => 'ManyKey',
      'co_cotisants_list' => 'ManyKey',
    );
  }
}
