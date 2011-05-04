<?php

/**
 * elElection form base class.
 *
 * @method elElection getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelElectionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nom'         => new sfWidgetFormTextarea(),
      'description' => new sfWidgetFormTextarea(),
      'date_debut'  => new sfWidgetFormDateTime(),
      'date_fin'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'         => new sfValidatorString(),
      'description' => new sfValidatorString(array('required' => false)),
      'date_debut'  => new sfValidatorDateTime(array('required' => false)),
      'date_fin'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('el_election[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elElection';
  }

}
