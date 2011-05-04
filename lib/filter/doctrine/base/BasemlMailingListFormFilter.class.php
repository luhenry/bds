<?php

/**
 * mlMailingList filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemlMailingListFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'               => new sfWidgetFormFilterInput(),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'nom'               => new sfValidatorPass(array('required' => false)),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ml_mailing_list_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
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
      ->leftJoin($query->getRootAlias().'.mlMailingListDestinataire mlMailingListDestinataire')
      ->andWhereIn('mlMailingListDestinataire.cotisant_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'mlMailingList';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nom'               => 'Text',
      'co_cotisants_list' => 'ManyKey',
    );
  }
}
