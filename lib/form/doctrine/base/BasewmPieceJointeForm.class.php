<?php

/**
 * wmPieceJointe form base class.
 *
 * @method wmPieceJointe getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasewmPieceJointeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'weekmail_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => false)),
      'nom'         => new sfWidgetFormTextarea(),
      'filename'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'weekmail_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'))),
      'nom'         => new sfValidatorString(),
      'filename'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('wm_piece_jointe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmPieceJointe';
  }

}
