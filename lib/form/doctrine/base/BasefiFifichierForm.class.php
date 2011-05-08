<?php

/**
 * fiFifichier form base class.
 *
 * @method fiFifichier getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasefiFifichierForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'dossier_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('dossier'), 'add_empty' => true)),
      'filename'     => new sfWidgetFormTextarea(),
      'content_type' => new sfWidgetFormTextarea(),
      'nom'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'dossier_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('dossier'), 'required' => false)),
      'filename'     => new sfValidatorString(),
      'content_type' => new sfValidatorString(),
      'nom'          => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('fi_fifichier[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'fiFifichier';
  }

}
