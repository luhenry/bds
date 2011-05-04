<?php

/**
 * acCommentaire form base class.
 *
 * @method acCommentaire getObject() Returns the current form's model object
 *
 * @package    BDS
 * @subpackage form
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseacCommentaireForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'actualite_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('actualite'), 'add_empty' => false)),
      'cotisant_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'add_empty' => true)),
      'contenu'      => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'actualite_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('actualite'))),
      'cotisant_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'required' => false)),
      'contenu'      => new sfValidatorString(),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ac_commentaire[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'acCommentaire';
  }

}
