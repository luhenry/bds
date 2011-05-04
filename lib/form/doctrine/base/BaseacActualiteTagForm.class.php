<?php

/**
 * acActualiteTag form base class.
 *
 * @method acActualiteTag getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseacActualiteTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'actualite_id' => new sfWidgetFormInputHidden(),
      'tag_id'       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'actualite_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('actualite_id')), 'empty_value' => $this->getObject()->get('actualite_id'), 'required' => false)),
      'tag_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tag_id')), 'empty_value' => $this->getObject()->get('tag_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ac_actualite_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'acActualiteTag';
  }

}
