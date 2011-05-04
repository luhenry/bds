<?php

/**
 * spSalle filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasespSalleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ville'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adresse'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'  => new sfWidgetFormFilterInput(),
      'longitude' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'       => new sfValidatorPass(array('required' => false)),
      'ville'     => new sfValidatorPass(array('required' => false)),
      'adresse'   => new sfValidatorPass(array('required' => false)),
      'latitude'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sp_salle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'spSalle';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nom'       => 'Text',
      'ville'     => 'Text',
      'adresse'   => 'Text',
      'latitude'  => 'Number',
      'longitude' => 'Number',
    );
  }
}
