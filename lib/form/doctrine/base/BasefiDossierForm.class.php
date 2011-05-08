<?php

/**
 * fiDossier form base class.
 *
 * @method fiDossier getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasefiDossierForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'nom'   => new sfWidgetFormTextarea(),
      'lft'   => new sfWidgetFormInputText(),
      'rgt'   => new sfWidgetFormInputText(),
      'level' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'   => new sfValidatorString(),
      'lft'   => new sfValidatorInteger(array('required' => false)),
      'rgt'   => new sfValidatorInteger(array('required' => false)),
      'level' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fi_dossier[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'fiDossier';
  }

}
