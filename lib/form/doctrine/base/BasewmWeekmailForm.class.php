<?php

/**
 * wmWeekmail form base class.
 *
 * @method wmWeekmail getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasewmWeekmailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'objet'        => new sfWidgetFormTextarea(),
      'introduction' => new sfWidgetFormTextarea(),
      'blague'       => new sfWidgetFormTextarea(),
      'conclusion'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'objet'        => new sfValidatorString(),
      'introduction' => new sfValidatorString(),
      'blague'       => new sfValidatorString(),
      'conclusion'   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wm_weekmail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmWeekmail';
  }

}
