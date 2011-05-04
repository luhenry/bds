<?php

/**
 * gaPhoto form base class.
 *
 * @method gaPhoto getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasegaPhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'activite_id' => new sfWidgetFormInputHidden(),
      'photo_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'activite_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('activite_id')), 'empty_value' => $this->getObject()->get('activite_id'), 'required' => false)),
      'photo_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('photo_id')), 'empty_value' => $this->getObject()->get('photo_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ga_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'gaPhoto';
  }

}
