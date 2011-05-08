<?php

/**
 * wmPieceJointe filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasewmPieceJointeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'weekmail_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => true)),
      'nom'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filename'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'weekmail_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('weekmail'), 'column' => 'id')),
      'nom'         => new sfValidatorPass(array('required' => false)),
      'filename'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wm_piece_jointe_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmPieceJointe';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'weekmail_id' => 'ForeignKey',
      'nom'         => 'Text',
      'filename'    => 'Text',
    );
  }
}
