<?php

/**
 * elSiege form base class.
 *
 * @method elSiege getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseelSiegeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'poste_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('poste'), 'add_empty' => false)),
      'election_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('election'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'poste_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('poste'))),
      'election_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('election'))),
    ));

    $this->widgetSchema->setNameFormat('el_siege[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'elSiege';
  }

}
