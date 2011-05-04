<?php

/**
 * mlAttachment form base class.
 *
 * @method mlAttachment getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemlAttachmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'mail_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => false)),
      'filename' => new sfWidgetFormTextarea(),
      'nom'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mail_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'))),
      'filename' => new sfValidatorString(),
      'nom'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('ml_attachment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mlAttachment';
  }

}
