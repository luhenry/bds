<?php

/**
 * spParticipant filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasespParticipantFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'statut'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'Participant' => 'Participant', 'Responsable' => 'Responsable'))),
      'is_admin'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'statut'      => new sfValidatorChoice(array('required' => false, 'choices' => array('Participant' => 'Participant', 'Responsable' => 'Responsable'))),
      'is_admin'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sp_participant_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spParticipant';
  }

  public function getFields()
  {
    return array(
      'sport_id'    => 'Number',
      'cotisant_id' => 'Number',
      'statut'      => 'Enum',
      'is_admin'    => 'Boolean',
    );
  }
}
