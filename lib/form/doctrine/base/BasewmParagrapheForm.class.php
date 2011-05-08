<?php

/**
 * wmParagraphe form base class.
 *
 * @method wmParagraphe getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasewmParagrapheForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'weekmail_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => false)),
      'titre'       => new sfWidgetFormTextarea(),
      'contenu'     => new sfWidgetFormTextarea(),
      'is_valide'   => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'weekmail_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'))),
      'titre'       => new sfValidatorString(),
      'contenu'     => new sfValidatorString(),
      'is_valide'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('wm_paragraphe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmParagraphe';
  }

}
