<?php

/**
 * acTag filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseacTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'actualites_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'acActualite')),
    ));

    $this->setValidators(array(
      'nom'             => new sfValidatorPass(array('required' => false)),
      'actualites_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'acActualite', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ac_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addActualitesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.acActualiteTag acActualiteTag')
      ->andWhereIn('acActualiteTag.actualite_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'acTag';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'nom'             => 'Text',
      'actualites_list' => 'ManyKey',
    );
  }
}
