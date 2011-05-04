<?php

/**
 * acCommentaire filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseacCommentaireFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'actualite_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('actualite'), 'add_empty' => true)),
      'cotisant_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('coCotisant'), 'add_empty' => true)),
      'contenu'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'actualite_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('actualite'), 'column' => 'id')),
      'cotisant_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('coCotisant'), 'column' => 'id')),
      'contenu'      => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ac_commentaire_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'acCommentaire';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'actualite_id' => 'ForeignKey',
      'cotisant_id'  => 'ForeignKey',
      'contenu'      => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
