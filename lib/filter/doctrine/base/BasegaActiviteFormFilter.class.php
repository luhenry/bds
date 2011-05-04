<?php

/**
 * gaActivite filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasegaActiviteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('contact'), 'add_empty' => true)),
      'nom'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lieu'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'site'              => new sfWidgetFormFilterInput(),
      'description'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_debut'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_fin'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'is_visible'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'              => new sfWidgetFormFilterInput(),
      'ph_photos_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto')),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'contact_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('contact'), 'column' => 'id')),
      'nom'               => new sfValidatorPass(array('required' => false)),
      'lieu'              => new sfValidatorPass(array('required' => false)),
      'site'              => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'date_debut'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_fin'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_visible'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'              => new sfValidatorPass(array('required' => false)),
      'ph_photos_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'phPhoto', 'required' => false)),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ga_activite_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.gaPhoto gaPhoto')
      ->andWhereIn('gaPhoto.photo_id', $values)
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
      ->leftJoin($query->getRootAlias().'.gaParticipant gaParticipant')
      ->andWhereIn('gaParticipant.cotisant_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'gaActivite';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'contact_id'        => 'ForeignKey',
      'nom'               => 'Text',
      'lieu'              => 'Text',
      'site'              => 'Text',
      'description'       => 'Text',
      'date_debut'        => 'Date',
      'date_fin'          => 'Date',
      'is_visible'        => 'Boolean',
      'slug'              => 'Text',
      'ph_photos_list'    => 'ManyKey',
      'co_cotisants_list' => 'ManyKey',
    );
  }
}
