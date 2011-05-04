<?php

/**
 * phPhoto filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasephPhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'filename'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content_type'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sp_sports_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'spSport')),
      'ga_activites_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite')),
    ));

    $this->setValidators(array(
      'filename'          => new sfValidatorPass(array('required' => false)),
      'content_type'      => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sp_sports_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'spSport', 'required' => false)),
      'ga_activites_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ph_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSpSportsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('spPhoto.sport_id', $values)
    ;
  }

  public function addGaActivitesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.gaPhoto gaPhoto')
      ->andWhereIn('gaPhoto.activite_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'phPhoto';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'filename'          => 'Text',
      'content_type'      => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'sp_sports_list'    => 'ManyKey',
      'ga_activites_list' => 'ManyKey',
    );
  }
}
