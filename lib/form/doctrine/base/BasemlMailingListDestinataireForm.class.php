<?php

/**
 * mlMailingListDestinataire form base class.
 *
 * @method mlMailingListDestinataire getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemlMailingListDestinataireForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'list_id'     => new sfWidgetFormInputHidden(),
      'cotisant_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'list_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('list_id')), 'empty_value' => $this->getObject()->get('list_id'), 'required' => false)),
      'cotisant_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cotisant_id')), 'empty_value' => $this->getObject()->get('cotisant_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ml_mailing_list_destinataire[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mlMailingListDestinataire';
  }

}
