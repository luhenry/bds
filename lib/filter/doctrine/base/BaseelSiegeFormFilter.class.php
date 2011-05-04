<?php

/**
 * elSiege filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseelSiegeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'poste_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('poste'), 'add_empty' => true)),
      'election_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('election'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'poste_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('poste'), 'column' => 'id')),
      'election_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('election'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('el_siege_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elSiege';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'poste_id'    => 'ForeignKey',
      'election_id' => 'ForeignKey',
    );
  }
}
