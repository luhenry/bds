<?php

/**
 * mlAttachment filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemlAttachmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mail_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => true)),
      'filename' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'mail_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('weekmail'), 'column' => 'id')),
      'filename' => new sfValidatorPass(array('required' => false)),
      'nom'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ml_attachment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mlAttachment';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'mail_id'  => 'ForeignKey',
      'filename' => 'Text',
      'nom'      => 'Text',
    );
  }
}
