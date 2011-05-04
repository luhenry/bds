<?php

/**
 * mlMail form base class.
 *
 * @method mlMail getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemlMailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'cotisant_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'add_empty' => true)),
      'objet'         => new sfWidgetFormTextarea(),
      'destinataires' => new sfWidgetFormTextarea(),
      'contenu'       => new sfWidgetFormTextarea(),
      'sent_at'       => new sfWidgetFormDateTime(),
      'type'          => new sfWidgetFormInputText(),
      'sport_id'      => new sfWidgetFormInputText(),
      'activite_id'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cotisant_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'required' => false)),
      'objet'         => new sfValidatorString(),
      'destinataires' => new sfValidatorString(array('required' => false)),
      'contenu'       => new sfValidatorString(),
      'sent_at'       => new sfValidatorDateTime(array('required' => false)),
      'type'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sport_id'      => new sfValidatorInteger(array('required' => false)),
      'activite_id'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ml_mail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mlMail';
  }

}
