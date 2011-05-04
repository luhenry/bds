<?php

/**
 * spPhoto form base class.
 *
 * @method spPhoto getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasespPhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sport_id' => new sfWidgetFormInputHidden(),
      'photo_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'sport_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('sport_id')), 'empty_value' => $this->getObject()->get('sport_id'), 'required' => false)),
      'photo_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('photo_id')), 'empty_value' => $this->getObject()->get('photo_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sp_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spPhoto';
  }

}
