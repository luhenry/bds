<?php

/**
 * coCotisant filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasecoCotisantFormFilter extends sfGuardUserFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['slug'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['slug'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema   ['sp_sports_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'spSport'));
    $this->validatorSchema['sp_sports_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'spSport', 'required' => false));

    $this->widgetSchema   ['ga_activites_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite'));
    $this->validatorSchema['ga_activites_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'gaActivite', 'required' => false));

    $this->widgetSchema   ['ml_mailing_lists_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mlMailingList'));
    $this->validatorSchema['ml_mailing_lists_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mlMailingList', 'required' => false));

    $this->widgetSchema->setNameFormat('co_cotisant_filters[%s]');
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
      ->leftJoin($query->getRootAlias().'.spParticipant spParticipant')
      ->andWhereIn('spParticipant.sport_id', $values)
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
      ->leftJoin($query->getRootAlias().'.gaParticipant gaParticipant')
      ->andWhereIn('gaParticipant.activite_id', $values)
    ;
  }

  public function addMlMailingListsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.mlMailingListDestinataire mlMailingListDestinataire')
      ->andWhereIn('mlMailingListDestinataire.list_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'coCotisant';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'slug' => 'Text',
      'sp_sports_list' => 'ManyKey',
      'ga_activites_list' => 'ManyKey',
      'ml_mailing_lists_list' => 'ManyKey',
    ));
  }
}
