<?php

/**
 * elPoste filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseelPosteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(),
      'slug'           => new sfWidgetFormFilterInput(),
      'elections_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'elElection')),
    ));

    $this->setValidators(array(
      'nom'            => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'slug'           => new sfValidatorPass(array('required' => false)),
      'elections_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'elElection', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('el_poste_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addElectionsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.elSiege elSiege')
      ->andWhereIn('elSiege.election_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'elPoste';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nom'            => 'Text',
      'description'    => 'Text',
      'slug'           => 'Text',
      'elections_list' => 'ManyKey',
    );
  }
}
