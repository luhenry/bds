<?php

/**
 * spSalle form base class.
 *
 * @method spSalle getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasespSalleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nom'       => new sfWidgetFormTextarea(),
      'ville'     => new sfWidgetFormTextarea(),
      'adresse'   => new sfWidgetFormTextarea(),
      'latitude'  => new sfWidgetFormInputText(),
      'longitude' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'       => new sfValidatorString(),
      'ville'     => new sfValidatorString(),
      'adresse'   => new sfValidatorString(),
      'latitude'  => new sfValidatorNumber(array('required' => false)),
      'longitude' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sp_salle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spSalle';
  }

}
