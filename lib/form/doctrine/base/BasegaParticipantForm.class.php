<?php

/**
 * gaParticipant form base class.
 *
 * @method gaParticipant getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasegaParticipantForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'activite_id' => new sfWidgetFormInputHidden(),
      'cotisant_id' => new sfWidgetFormInputHidden(),
      'statut'      => new sfWidgetFormChoice(array('choices' => array('Participant' => 'Participant', 'Responsable' => 'Responsable'))),
      'is_admin'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'activite_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('activite_id')), 'empty_value' => $this->getObject()->get('activite_id'), 'required' => false)),
      'cotisant_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cotisant_id')), 'empty_value' => $this->getObject()->get('cotisant_id'), 'required' => false)),
      'statut'      => new sfValidatorChoice(array('choices' => array(0 => 'Participant', 1 => 'Responsable'), 'required' => false)),
      'is_admin'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ga_participant[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'gaParticipant';
  }

}
