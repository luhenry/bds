<?php

/**
 * elVote filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseelVoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'liste_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('liste'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'liste_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('liste'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('el_vote_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elVote';
  }

  public function getFields()
  {
    return array(
      'siege_id'    => 'Number',
      'cotisant_id' => 'Number',
      'liste_id'    => 'ForeignKey',
    );
  }
}
