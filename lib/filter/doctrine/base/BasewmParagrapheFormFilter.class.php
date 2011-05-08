<?php

/**
 * wmParagraphe filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasewmParagrapheFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'weekmail_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('weekmail'), 'add_empty' => true)),
      'titre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contenu'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_valide'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'weekmail_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('weekmail'), 'column' => 'id')),
      'titre'       => new sfValidatorPass(array('required' => false)),
      'contenu'     => new sfValidatorPass(array('required' => false)),
      'is_valide'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('wm_paragraphe_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'wmParagraphe';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'weekmail_id' => 'ForeignKey',
      'titre'       => 'Text',
      'contenu'     => 'Text',
      'is_valide'   => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
