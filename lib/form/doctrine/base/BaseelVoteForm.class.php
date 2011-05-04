<?php

/**
 * elVote form base class.
 *
 * @method elVote getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelVoteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'siege_id'    => new sfWidgetFormInputHidden(),
      'cotisant_id' => new sfWidgetFormInputHidden(),
      'liste_id'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'siege_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('siege_id')), 'empty_value' => $this->getObject()->get('siege_id'), 'required' => false)),
      'cotisant_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cotisant_id')), 'empty_value' => $this->getObject()->get('cotisant_id'), 'required' => false)),
      'liste_id'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('el_vote[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elVote';
  }

}
